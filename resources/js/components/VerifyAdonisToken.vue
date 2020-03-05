<template>
    <table id="tableAdonisToken" class="table table-dark table-striped table-bordered">
        <thead>
        <h4>Adonis token status</h4>
        </thead>
        <tbody id="tbodyAdonisTokenTable">
        <tr>
            <td>Tu jwt token es:</td>
        </tr>
        <tr>
            <td>{{jwt_token}}</td>
        </tr>
        <tr>
            Tu refresh token es:
        </tr>
        <tr>
            <td>{{refresh_token}}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data(){
            return {
                jwt_token : null,
                refresh_token: null

            }
        },
        mounted() {
            // axios.defaults.headers.common['Authorization'] = '';
            // <meta name="csrf-token" content="{{ csrf_token() }}">
            // alert($('meta[name="csrf-token"]').attr('content'));
            let self = this;
            getJwtToken(self);
        }
    }

    function getJwtToken(self) {
        axios.get('/token/adonis/get').then(function (response) {
            console.log(response.data);
            if(response.data.jwt_token === null || response.data.jwt_token === '')
            {
                self.jwt_token = 'No tienes jwt token de Adonis aun.';
                self.refresh_token = 'No tienes refresh token de Adonis aun.';
                $('#tbodyAdonisTokenTable').prepend('<tr><td><p>No cuentas con un usuario en adonis, por tanto careces de tokens en adonis. Debes registrarte en adonis para poder usar la api.</p></td></tr>');
                $('#tableAdonisToken tbody').append('<tr><td><input type="button" id="crearUsuarioAdonis" class="btn btn-block bg-primary" value="CREAR USUARIO PARA ADONIS"></td></tr>');
                $('#crearUsuarioAdonis').on('click', function () {
                    window.location = '/user/adonis/register';
                });
            }
            else
            {
                self.jwt_token = response.data.jwt_token;
                self.refresh_token = response.data.refresh_token;
                $('#tableAdonisToken tbody').append('<tr><td><input type="button" id="cambiarAdonisTokens" class="btn btn-block bg-primary" value="CAMBIAR TOKENS PARA ADONIS"></td></tr>');
                $('#cambiarAdonisTokens').on('click',function () {
                    alert('heheeeee');
                });
            }
        }).catch(function (response) {
            console.log(response);
        });
    }

</script>
