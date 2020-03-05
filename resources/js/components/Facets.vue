<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Peticion facets
                    </div>
                    <div class="card-body">
                        <input type="button" class="btn bg-primary" value="ENVIAR PETICION" v-on:click="peticion">
                        <vue-json-pretty
                            :path="'res'"
                            :data="{ respuesta }"
                            @click="handleClick">
                        </vue-json-pretty>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import VueJsonPretty from 'vue-json-pretty'

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
                this.respuesta = null;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.laravel_token;
                axios.get('/api/shodan/facets').then(function (response) {
                    console.log(response.data);
                    self.respuesta = response.data;
                }).catch(function (response) {

                });
            }
        },
        components: {
            VueJsonPretty
        }
    }
</script>
