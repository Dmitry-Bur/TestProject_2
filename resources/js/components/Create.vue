<template>
<div>
    <form>
        <div class="mb-3">
            <label class="form-label ">ФИО</label>
            <input v-model="full_name" type="text" class="form-control w-25" >
        </div>
        <div class="mb-3">
            <label  class="form-label ">Компания</label>
            <input v-model="company" type="text" class="form-control w-25" >
        </div>
        <div class="mb-3">
            <label  class="form-label ">Номер телефона</label>
            <input v-model="phone_number" type="text" class="form-control w-25" >
        </div>
        <div class="mb-3">
            <label  class="form-label ">Email</label>
            <input v-model="email" type="email" class="form-control w-25" >
        </div>
        <div class="mb-3">
            <label  class="form-label ">Дата рождения</label>
            <input v-model="birth_date" type="date" class="form-control w-25" >
        </div>


            <label  class="form-label x">Изображение </label>
        <div class="mb-3">
            <input type="file" id="image" ref="image"  @change="onAttachmentChange">
        </div>





        <button @click.prevent="Create" type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            full_name: null,
            company: null,
            phone_number: null,
            email: null,
            birth_date: null,
            image: null,
        }
    },


    methods:{
        onAttachmentChange (e) {
            this.image = e.target.files[0]
        },


        Create() {
            const config = { 'content-type': 'multipart/form-data' }
            let data = new FormData();

            data.append('full_name', this.full_name)
            data.append('company', this.company)
            data.append('phone_number', this.phone_number)
            data.append('email', this.email)
            data.append('birth_date', this.birth_date)
            data.append('image_url', this.image)

            console.log(data)
            axios.post('/api/v1/notebook/',
                   data, config
                )
                .then(res => {
                    this.$router.push({name: 'notebook.index'});
                }) .catch(res =>{
                console.log('FAILURE!!');
            });
        }
    }


}
</script>

<style scoped>

</style>
