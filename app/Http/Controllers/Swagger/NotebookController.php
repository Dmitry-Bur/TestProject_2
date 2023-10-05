<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Post(
 *     path="/api/v1/notebook",
 *     summary="Создание записи",
 *     tags={"Note"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                         @OA\Property(property="full_name", type="string", example="Some full name"),
 *                         @OA\Property(property="company", type="string", example="Some company"),
 *                         @OA\Property(property="phone_number", type="string", example="Some phone number"),
 *                         @OA\Property(property="email", type="string", example="Mail@gmail.com"),
 *                         @OA\Property(property="birth_date", type="string", example="2023-10-07"),
 *                         @OA\Property(property="image_url", type="string", example=" "),
 *                     )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response="200",
 *         description="Ok",
 *         @OA\JsonContent(
 *                     @OA\Property(property="message", type="string", example = "ok"),
 *                 ),
 *
 *     ),
 *
 * ),
 *
 *
 *
 *
 * @OA\Get(
 *     path="/api/v1/notebook",
 *     summary="Список постов",
 *     tags={"Note"},
 *
 *     @OA\Response(
 *         response="200",
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="full_name", type="string", example="Tests 1"),
 *                 @OA\Property(property="company", type="string", example="Some company"),
 *                 @OA\Property(property="phone_number", type="string", example="88998899988"),
 *                 @OA\Property(property="email", type="string", example="mail@mail.ru"),
 *                 @OA\Property(property="birth_date", type="date", example="2023-10-07"),
 *                 @OA\Property(property="image_url", type="string", example="/storage/images/5428e1c13ffdf5bca95141ecc01407f1.png"),
 *             ),
 *             ),
 *         )
 *     ),
 *
 * ),
 *
 * @OA\Get(
 *     path="/api/v1/notebook/{id}",
 *     summary="Чтение записи",
 *     tags={"Note"},
 *
 *     @OA\Parameter(
 *         description="Id записи",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=3,
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="full_name", type="string", example="Tests 1"),
 *                 @OA\Property(property="company", type="string", example="Some company"),
 *                 @OA\Property(property="phone_number", type="string", example="88998899988"),
 *                 @OA\Property(property="email", type="string", example="mail@mail.ru"),
 *                 @OA\Property(property="birth_date", type="date", example="2023-10-07"),
 *                 @OA\Property(property="image_url", type="string", example="/storage/images/5428e1c13ffdf5bca95141ecc01407f1.png"),
 *             ),
 *         )
 *     ),
 *
 * ),
 *
 * @OA\Patch(
 *     path="/api/v1/notebook/{id}",
 *     summary="Обновление записи",
 *     tags={"Note"},
 *
 *     @OA\Parameter(
 *         description="Id записи",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=3,
 *     ),
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                         @OA\Property(property="full_name", type="string", example="Some full name"),
 *                         @OA\Property(property="company", type="string", example="Some company"),
 *                         @OA\Property(property="phone_number", type="string", example="Some phone number"),
 *                         @OA\Property(property="email", type="string", example="Mail@gmail.com"),
 *                         @OA\Property(property="birth_date", type="string", example="2023-10-07"),
 *                         @OA\Property(property="image_url", type="string", example=" "),
 *                  )
 *              }
 *          )
 *      ),
 *
 *     @OA\Response(
 *         response="200",
 *         description="Ok",
 *         @OA\JsonContent(
 *                     @OA\Property(property="message", type="string", example = "ok"),
 *                 ),
 *
 *     ),
 *
 * ),
 *
 * @OA\Delete(
 *     path="/api/v1/notebook/{id}",
 *     summary="Удаление записи",
 *     tags={"Note"},
 *
 *     @OA\Parameter(
 *         description="Id записи",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=3,
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="done"),
 *         )
 *     ),
 *
 * ),
 *
 *
 */


class NotebookController extends Controller
{

}
