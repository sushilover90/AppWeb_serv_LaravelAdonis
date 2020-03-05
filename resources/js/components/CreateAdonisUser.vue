<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <label for="username">Ingresa el username:</label>
                <input v-model="username" id="username" type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="password">Ingresa el password</label>
                <input v-model="password" type="password" name="" id="password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input class="btn bg-primary" v-on:click="registrar" value="Ingresar">
            </div>
        </div>
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
                    axios.post('/token/adonis/set',
                        {'jwt_token':response.data.adonis_response.token,'refresh_token':response.data.adonis_response.refreshToken})
                        .then(function () {
                            window.location = '/home';
                    }).catch(function (response) {

                    });
                }).catch(function (response) {
                    console.log(response);
                });
            }
        }
    }
</script>
