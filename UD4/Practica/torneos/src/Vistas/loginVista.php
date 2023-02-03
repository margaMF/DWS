<?php

require ("../Negocio/usuarioReglasNegocio.php");

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $usuarioBL = new UsuarioReglasNegocio();
    $perfil =  $usuarioBL->verificar($_POST['usuario'],$_POST['clave']);

    if ($perfil==="Administrador"){
        session_start(); //inicia o reinicia una sesión
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: torneosVista.php");
    }else if($perfil==="Jugador"){
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: listaTorneosVistaJugador.php");
    }else {
        $error = true;
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de torneos</title>
        <link rel="stylesheet" href="../../css/loginVista.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>

        <div class="contenedor">

            <?php
                if (isset($error)){
                    echo "<p style='color: red; text-align: center;'><strong>No tienes acceso</strong></p>";
                }
            ?>
        
            <div class="contenedorFormulario">
                <h1>Iniciar sesión</h1>
                <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="nombre">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" value="" class="cajaNombre"><br><br>

                    <label for="nombre">Contraseña:</label>
                    <input type="password" name="clave" id="clave" value="" class="cajaContra"><br><br>
                    <input type="submit" name="enviar" value="Enviar" class="botonEnviar"><br>
                </form>
            </div>
        <div>
        
    </body>
</html>