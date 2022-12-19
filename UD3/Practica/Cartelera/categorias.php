<html>
    <head>
        <title>Cartelera</title>
        <link rel="stylesheet" href="categoria.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="contenedor">

            <div class="primera_caja">
                <div class="botonInicio">
                    <a href="peliculas.php" class="cabecera">CATEGORÍAS DE LAS PELÍCULAS</a>
                </div>
            </div>

            <div class="segunda_caja">
                <div class="contenedorPeliculas">
                    <div class="primera_columna">
                        <div class="contenedorCategorias">
                            <p>Elige la categoría que prefieras</p>
                            <br>
                            <?php 
                                require('claseCategoria.php');

                                ini_set('display_errors', 'On');
                                ini_set('html_errors', 0);

                                $c = new Categoria();
                                $datos = $c->obtenerDatos();
                                $c->pintarCategoria($datos);

                            ?>
                        </div>
                    </div>
                </div>    

            </div>
            
        <div>

    </body>
</html>

