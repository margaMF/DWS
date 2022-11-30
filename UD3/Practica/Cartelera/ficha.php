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
                <a href="index.html" class="boton">PELÍCULA</a>
            </div>
        </div>

        <div class="segunda_caja">

            <div class="contenedorPeliculas">
                <!-- 
                <div class="primera_columna">
                    <div class="contenedorImagen">
                       <img src="img/terror/pelicula1.jpg" alt="Sinister" class="imagenes">
                    </div>
               </div>
   
               <div class="segunda_columna">
                   <div class="contenedorSinopsisFicha">
                        <p class="votos">Votos:</p>
                        <p class="subtitulo">SINISTER:</p>
                        <p><span style="font-weight: 900; color: rgb(127, 91, 91)">Duración:</span> 110 minutos</p>
                        <p><span style="font-weight: 900; color: rgb(127, 91, 91)">Año:</span> 2012</p>
                        <p><span style="font-weight: 900; color: rgb(127, 91, 91)">Directores/as:</span> Scott Derrickson</p>
                        <p><span style="font-weight: 900; color: rgb(127, 91, 91)">Reparto:</span> Ethan Hawke, James Ransone, Juliet Rylance, Vincent D'Onofrio, Fred Dalton Thompson, Clare Foley, Michael Hall D'Addario, Victoria Leigh, Cameron Ocasio</p>
                        <br>
                        <p>Ellison (Ethan Hawke, 'Gattaca'), es un periodista especializado en escribir artículos y novelas sobre casos de crímenes célebres. Para poder dedicarse a esta tarea en cuerpo y alma, ha instaurado una sistema de vida itinerante un tanto particular con su familia: se trasladan todos juntos de condado en condado para instalarse durante un tiempo en el lugar de los hechos y así poder investigar en profundidad cada uno de los casos.
                        Una de estas investigaciones le llevará a una casa donde toda la familia murió asesinada. Y allí se quedará a vivir con su mujer y sus hijos para poder inspirarse mejor y recabar los datos necesarios para la confección de su novela. Sin embargo, una vez en la casa, la familia descubrirá una serie de documentación y de cintas de vídeo en las que se recogen los detalles de estos misteriosos homicidios. Ellison comenzará a tirar del hilo de estas pistas y descubrirá que las muertes no han sido causadas por la mano de ningún ser humano, sino de una entidad sobrenatural que todavía se encuentra presente en la casa...</p>
                   </div>
               </div> -->

               <?php 

                    ini_set('display_errors', 'On');
                    ini_set('html_errors', 0);

                    require("clasePelicula.php");

                    function obtenerDatos($categoria){

                        $conexion = mysqli_connect('localhost', 'root', '1234');
                
                        mysqli_select_db($conexion, 'cartelera');
                
                        $consulta = "SELECT t_genero.nombre, titulo, año, duracion, sinopsis, imagen, votos, id_categoria FROM t_peliculas INNER JOIN t_genero ON t_genero.id = t_peliculas.id_categoria WHERE id_categoria = 2;";
                
                        $resultado = mysqli_query($conexion, $consulta);
                
                        if (!$resultado){
                            $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                            $mensaje = 'Consulta realitzada: ' . $consulta;
                            die($mensaje);
                        }else{
                            echo "conexión OK"."<br>";  
                
                            $i = 0;
                
                            while($registro = mysqli_fetch_assoc($resultado) ){
                                
                                $datosPeliculas[$i] = new Pelicula($registro['nombre'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'], $registro['votos'], $registro['id_categoria']);
                                
                                $i++;
                            }

                            return $datosPeliculas;
                        }
                }
                $categoria = 2;
                $pelicula = obtenerDatos($categoria);
                var_dump($pelicula);
               ?>

            </div>

        </div>
        
    <div>
</body>
</html>

