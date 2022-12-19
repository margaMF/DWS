<html>
    <head>
        <title>Cartelera</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

        <?php 
            if($_GET['id_categoria'] == 1){
                echo '<link rel="stylesheet" href="terror.css">';
            }elseif($_GET['id_categoria'] == 2){
                echo '<link rel="stylesheet" href="tarantino.css">';
            }
        ?>

    </head>
    <body>
        <div class="contenedor">

            <div class="primera_caja">
                <div class="botonInicio">
                    <h1 class="boton">MARATONES</h1>
                </div>
            </div>


            <div class="segunda_caja">
                <?php
                    
                    require('clasePelicula.php');

                    ini_set('display_errors', 'On');
                    ini_set('html_errors', 0);
                    
                    $p = new Pelicula();

                    $categoria = $_GET['id_categoria'];
                    
                    $datos = $p->obtenerPeliculasPorCategoria($categoria);
                    $p->pintarPeliculas($datos);
                ?>
            </div>

        <div>
    </body>
</html>
