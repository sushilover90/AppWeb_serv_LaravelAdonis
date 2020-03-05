<template>
    <table id="tableShodanToken" class="table table-dark table-striped table-bordered">
        <thead>
        <h4>Shodan token status</h4>
        </thead>
        <tbody>
        <tr>
            <td>Tu token shodan es:</td>
        </tr>
        <tr>
            <td>{{shodan_token}}</td>
        </tr>
        <tr>
            <td>
                <label for="shodanTokenInput">Ingresa un nuevo token de shodan</label>
                <input placeholder="Ingresa el nuevo token de shodan" v-model="input_token" type="text" name="" id="shodanTokenInput" class="form-control">
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data(){
            return {
                shodan_token : null,
                input_token : null,
            }
        },
        mounted() {
            // axios.defaults.headers.common['Authorization'] = '';
            // <meta name="csrf-token" content="{{ csrf_token() }}">
            // alert($('meta[name="csrf-token"]').attr('content'));
            let self = this;
            getShodanToken(self);
        }
    }

    function getShodanToken(self)
    {
        axios.get('/token/shodan/get').then(function (response){
            console.log(response.data);
            if(response.data===''||response.data===null)
            {
                self.shodan_token = "No tienes token de shodan aun.";
                ShodanToken(self,response,null);
            }
            else
            {
                ShodanToken(self,response,1);
                self.shodan_token = response.data;
            }
        }).catch(function (response){

        });
    } // function getLaravelToken(self) END

    function deleteMessage()
    {
        setTimeout(function () {
            $('#tfooterShodanToken').remove()
        }, 1000);
    }

    function ShodanToken(self, response, opcion)
    {
        let propiedad = 'generarShodanToken';
        let texto = 'generar token shodan';
        let url = '/token/shodan/set';
        if(opcion===1) {
            propiedad = 'cambiarShodanToken';
            texto = 'cambiar token shodan';
            url = '/api/token/shodan/set';
        }
        $('#tableShodanToken tbody').append('<tr><td><input class="btn btn-block bg-primary" type="button" id="'+propiedad+'" value="'+texto.toUpperCase()+'"></td></tr>');
        $('#'+propiedad).on('click',function () {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.laravel_token;
            axios.post(url,{shodan_token:self.input_token}).then(function (response) {
                console.log(response.data.shodan_token);
                self.shodan_token = response.data.shodan_token;
                $('#tableShodanToken').append('<tfooter id="tfooterShodanToken"><tr><td>Token cambiado</td></tr></tfooter>');
                deleteMessage();
            }).catch(function (response) {
                console.log(response);
            });
        });
    }

</script>
