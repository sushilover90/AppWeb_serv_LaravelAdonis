<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Peticion protocols
                    </div>
                    <div class="card-body">
                        {{respuesta}}
                    </div>
                    <div class="card-footer">
                        <input type="button" class="btn bg-primary" value="ENVIAR PETICION" v-on:click="peticion">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                respuesta: null
            }
        },
        mounted() {

        },
        methods:{
            peticion:function () {
                let self = this;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.laravel_token;
                axios.get('/api/shodan/protocols').then(function (response) {
                    console.log(response.data);
                    self.respuesta = response.data;
                }).catch(function (response) {

                });
            }
        }
    }
</script>
