<html>
    <head>
        <title>Cartelera</title>
        <link rel="stylesheet" href="terror.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="contenedor">

            <div class="primera_caja">
                <div class="botonInicio">
                    <a href="index.html" class="boton">MARATONES</a>
                </div>
            </div>


            <div class="segunda_caja">
                <?php
                
                    require('clasePelicula.php');

                    ini_set('display_errors', 'On');
                    ini_set('html_errors', 0);
                    
                    $p = new Pelicula();
                    $datos = $p->obtenerDatos($categoria);
                    $p->pintarPeliculas($datos);
                ?>
            </div>

        <div>
    </body>
</html>
