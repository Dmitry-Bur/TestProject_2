<template>

    <form>
        <div class="mb-3">
            <label class="form-label ">ФИО</label>
            <input v-model="full_name" type="text" class="form-control w-25">
        </div>
        <div class="mb-3">
            <label class="form-label ">Компания</label>
            <input v-model="company" type="text" class="form-control w-25">
        </div>
        <div class="mb-3">
            <label class="form-label ">Номер телефона</label>
            <input v-model="phone_number" type="text" class="form-control w-25">
        </div>
        <div class="mb-3">
            <label class="form-label ">Email</label>
            <input v-model="email" type="email" class="form-control w-25">
        </div>
        <div class="mb-3">
            <label class="form-label ">Дата рождения</label>
            <input v-model="birth_date" type="date" class="form-control w-25">
        </div>


        <div v-if="note.image_url == 'null'"> Прошлое изображение отсутствует</div>
        <div class="mb-3" v-if="note.image_url != 'null'">
            <label class="form-label x">Прошлое изображение </label>
            <img class="img-thumbnail" width="88" height="88" :src="note.image_url">
        </div>

        <label class="form-label x"> Новое изображение: </label>
        <div class="mb-3">
            <input type="file" id="image" ref="image" @change="onAttachmentChange">
        </div>

        <button @click.prevent="Update" type="submit" class="btn btn-primary">Редактировать</button>

    </form>

</template>

<script>
export default {
    name: "Edit",
    data() {
        return {

            note: [],

            full_name: null,
            company: null,
            phone_number: null,
            email: null,
            birth_date: null,
            image: null,

        }
    },

    mounted() {
        this.getNote();
    },

    methods: {

        onAttachmentChange(e) {
            this.image = e.target.files[0]
        },


        getNote() {

            console.log(this.$route.params.id);
            // гет параметр пришел с компонента вью по vue-router (router.js) и отправляем на бек

            axios.get(`/api/v1/notebook/${this.$route.params.id}`).then(res => {
                this.note = res.data.data
                console.log(res.data.data)

                this.full_name = this.note.full_name
                this.company = this.note.company
                this.phone_number = this.note.phone_number
                this.email = this.note.email
                this.birth_date = this.note.birth_date
                //this.image = this.note.image_url

            })
        },

        Update() {
            const config = {'content-type': 'multipart/form-data'}
            let data = new FormData();

            data.append('_method','PATCH')
            data.append('full_name', this.full_name)
            data.append('company', this.company)
            data.append('phone_number', this.phone_number)
            data.append('email', this.email)
            data.append('birth_date', this.birth_date)
            data.append('image_url', this.image)

            console.log( this.full_name)
            console.log(this.email)
            console.log('o---')
            axios.post(`/api/v1/notebook/${this.$route.params.id}`,
                data, config
            )
                .then(res => {
                    console.log('ok')
                    this.$router.push({name: 'notebook.index'});
                })

        }

    }
}
</script>

<style scoped>

</style>
