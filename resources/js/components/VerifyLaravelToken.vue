<template>
    <table id="tableLaravelToken" class="table table-dark table-striped table-bordered">
        <thead>
        <h4>Laravel token status</h4>
        </thead>
        <tbody>
        <tr>
            <td>Tu token laravel es:</td>
        </tr>
        <tr>
            <td>{{laravel_token}}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data(){
            return {
                laravel_token : null,
            }
        },
        mounted() {
            // axios.defaults.headers.common['Authorization'] = '';
            // <meta name="csrf-token" content="{{ csrf_token() }}">
            // alert($('meta[name="csrf-token"]').attr('content'));
            let self = this;
            getLaravelToken(self);
        }
    }

    function getLaravelToken(self)
    {
        axios.get('/token/laravel/get').then(function (response){
            console.log(response.data);
            if(response.data===''||response.data===null)
            {
                self.laravel_token = "No tienes token de laravel aun.";
                LaravelToken(self,response,null);
            }
            else
            {
                LaravelToken(self,response,1);
                self.laravel_token = response.data;
            }
        }).catch(function (response){

        });
    } // function getLaravelToken(self) END

    function deleteMessage()
    {
        setTimeout(function () {
            $('#tfooterLaravelToken').remove()
        }, 1000);
    }

    function LaravelToken(self, response, opcion)
    {
        let propiedad = 'generarLaravelToken';
        let texto = 'generar token laravel';
        let url = '/token/laravel/set';
        if(opcion===1) {
            propiedad = 'cambiarLaravelToken';
            texto = 'cambiar token laravel';
            url = '/api/token/laravel/set';
        }
        localStorage.laravel_token = response.data;
        $('#opcionesSidebar').append('<li class="" id="'+propiedad+'"><a><p>'+texto+'</p></a></li>');
        $('#'+propiedad).on('click',function () {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.laravel_token;
            axios.get(url).then(function (response) {
                self.laravel_token = response.data.new_token;
                localStorage.laravel_token = response.data.new_token;
                $('#tableLaravelToken').append('<tfooter id="tfooterLaravelToken"><tr><td>Token cambiado</td></tr></tfooter>');
                deleteMessage();
            }).catch(function (response) {
                console.log(response);
            });
        });
    }

</script>
