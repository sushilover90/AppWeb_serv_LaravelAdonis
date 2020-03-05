<template>
    <div>
        <label for="username">Ingresa el username:</label>
        <input v-model="username" id="username" type="text" class="form-control">
        <label for="password">Ingresa el password</label>
        <input v-model="password" type="password" name="" id="password" class="form-control">
        <input class="btn bg-primary" v-on:click="registrar" value="Ingresar">
    </div>
</template>

<script>
    export default {
        mounted(){

        },
        data(){
            return{
                username : null,
                password : null,
            }
        },
        methods:{
            registrar:function () {
                // alert("HoLa");
                let self = this;
                axios.post('/user/adonis/register/request',
                    {username:self.username,password:self.password}).then(function (response) {
                    console.log(response.data);
                }).catch(function (response) {
                });
            }
        }
    }
</script>
