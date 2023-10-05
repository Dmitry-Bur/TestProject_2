<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //  $notebook = Notebook::all();
       $notebook = Notebook::paginate(4);

       return NotebookResource::collection($notebook);
    }


    public function store(StoreRequest $request)
    {
        $note = $request->validated();

       // dd($note);
        if($note['image_url'] === "null" || !($note['image_url']))
        {
            Notebook::create($note);
        }else{
            $name = md5(Carbon::now() . '_' . $note['image_url']->getClientOriginalName()) . '.' . $note['image_url']->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('/images', $note['image_url'], $name);
            $note['image_url'] = '/storage/'.$path; // сформированный путь к сохраненному изображению
            Notebook::create($note);
        }


        return response([
            "message" => 'ok'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function show(Notebook $id)
    {
       // dd($id);
        return NotebookResource::make($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Notebook $notebook)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Notebook $id)
    {
       // dd($id);
       $note =  $request->validated();
      // $id->update($note);

        //dd($note);
        if($note['image_url'] === "null" || !($note['image_url']))
        {
            $id->update([
                'full_name' => $note['full_name'],
                'company' => $note['company'],
                'phone_number' => $note['phone_number'],
                'email' => $note['email'],
                'birth_date' => $note['birth_date'],
            ]);
        }else{
            $name = md5(Carbon::now() . '_' . $note['image_url']->getClientOriginalName()) . '.' . $note['image_url']->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('/images', $note['image_url'], $name);
            $note['image_url'] = '/storage/'.$path; // сформированный путь к сохраненному изображению
            $id->update($note);
        }

        return response([
            "message" => 'ok'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notebook $id)
    {
        $id->delete();
        return response([
            "message" => 'ok'
        ]);
    }
}
