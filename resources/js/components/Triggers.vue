<template>


    <div class="container">



        <h1>Triggers Response</h1>
<!-- 
         <ul>
             <li v-for="(value, key) in respuesta.adonis_response" v-bind:key = key>{{ key }}: {{ value }} </li>
        </ul> -->

        <table class="table table-dark">
  <thead>
    <tr>
      <th>Name</th>
      <th>Rule</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="respuesta in respuesta.adonis_response" v-bind:key="respuesta.key">
      <td>{{respuesta.name}}</td>
      <td>{{respuesta.description}}</td>
      <td>{{respuesta.rule}}</td>
    </tr>
  </tbody>
</table>
        <!-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       <h4>66</h4>
                    </div> -->

                     <!-- <div class="jumbotron jumbotron-fluid">
                     <div class="container">
                        <h1 class="display-4">{{adonis_response.body.andromouse}}</h1>
                        <p class="lead"></p>
                    </div>
                    </div> -->

                    <!-- <div class="card-body">
                        <input type="button" class="btn bg-primary" value="ENVIAR PETICION" v-on:click="peticion">
                        <vue-json-pretty
                            :path="'res'"
                            :data="{ respuesta }"
                            @click="handleClick">
                        </vue-json-pretty>
                    </div> -->
                <!-- </div>
            </div>
        </div> --> 
    </div>
</template>

<script>

    import VueJsonPretty from 'vue-json-pretty'

    export default {
        data(){
            return{
                respuesta: []
            }
        },
        mounted() {

        },

        created(){
            this.traer();
        } ,
        methods:{

            traer(){

                let self = this;
                this.respuesta = null;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.laravel_token;
                axios.get('/api/shodan/triggers').then(function (response) {
                    console.log(response.data);
                    self.respuesta = response.data;
                    //AE
                
                    //
                    console.log(self.respuesta.adonis_response);
                    console.log(self.respuesta.adonis_response);

                }).catch(function (response) {

                });
            }

            },

            // peticion:function () {
            //     let self = this;
            //     this.respuesta = null;
            //     axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.laravel_token;
            //     axios.get('/api/shodan/protocols').then(function (response) {
            //         console.log(response.data);
            //         self.respuesta = response.data;
            //         //AE
            //         console.log(self.respuesta.adonis_response.ard);
            //         //
            //         console.log(self.respuesta.adonis_response);
            //         console.log(self.respuesta.adonis_response);

            //     }).catch(function (response) {

            //     });
            // }
        
        components: {
            VueJsonPretty
        }
    }
</script>
