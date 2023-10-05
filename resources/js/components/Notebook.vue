<template>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Notebook</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Notebook</li>
        </ol>


    </div>

    <div class="card mb-4 w-75">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Компания</th>
                <th scope="col">Телефон</th>
                <th scope="col">Email</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Фото</th>
                <th scope="col">Удаление</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="note in notebook">
                <th scope="row">{{note.id}}</th>
                <td>
                    <router-link :to="{ name: 'notebook.edit', params: { id: note.id }}">{{note.full_name}}</router-link>
                </td>
                <td>{{note.company}}</td>
                <td>{{note.phone_number}}</td>
                <td>{{note.email}}</td>
                <td>{{note.birth_date}}</td>
                <td>
                    <img class="img-thumbnail" v-if="note.image_url != 'null'" width="88" height="88" :src="note.image_url">
                    <div v-if="note.image_url == 'null'"> Нет изображения </div>
                </td>

                <td>
                    <a class="nav-link " @click.prevent="DeleteNote(note.id)" href="#">
                        <i class="fas fa-trash"></i>
                        Удалить
                    </a>
                </td>
            </tr>
            </tbody>
        </table>



        <!--        Пагинация    -->
            <ul >
                <li >
                    <a v-if="prev" href="#"
                       @click.prevent="(prev) ? getNotebook(prev):''">
                        Предыдущая стр. {{current_page-1}}
                    </a>
                    <b> Текущая стр. {{current_page}} </b>
                    <a v-if="next" href="#"
                       @click.prevent="(next) ? getNotebook(next):''">
                        Следующая стр. {{current_page+1}}
                    </a>
                </li>



            </ul>


    </div>
</template>

<script>
export default {
    name: "Notebook",

    data(){
        return{
            notebook:[],

            page: '/api/v1/notebook/',
            next: '',
            prev: '',

            current_page : null,
        }
    },

    methods:{
        getNotebook(page){
            axios.get(page).
            then( res => {
                this.notebook = res.data.data
                this.next = res.data.links.next
                this.prev = res.data.links.prev
                this.current_page = res.data.meta.current_page
                console.log(res.data)
            })
        },

        getNote(id){
            axios.get(`/api/v1/notebook/${id}`).
            then( res => {
                this.notebook = res.data.data
                console.log(res.data.data)
            })
        },

        DeleteNote(id){
                axios.delete(`/api/v1/notebook/${id}`).
                then( res => {
                    console.log(res.data.data)
                    this.getNotebook()
                })
        }
    },


    mounted() {
        this.getNotebook(this.page)
    }


}
</script>

<style scoped>

</style>
