<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("../Infraestructura/usuarioAccesoDatos.php");

    class UsuarioReglasNegocio
    {

        function __construct()
        {
        }
        function verificar($usuario, $clave)
        {
            $usuariosDAL = new UsuarioAccesoDatos();
            $res = $usuariosDAL->verificar($usuario,$clave);
            
            if(strlen($clave) < 8){
                echo"<p style='color: red; text-align: center; margin-top: 20px;'><strong>La contraseña debe tener mínimo 8 carácteres</strong></p>";
            }

            return $res;
            
        }
    }

