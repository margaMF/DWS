<?php

class Pelicula{

    function __construct(){

    }
    
    function init($id_categoria, $titulo, $año, $duracion, $sinopsis, $imagen, $votos){
        $this-> id_categoria = $id_categoria;
        $this-> titulo = $titulo;
        $this-> año = $año;
        $this-> duracion = $duracion;
        $this-> sinopsis = $sinopsis;
        $this-> imagen = $imagen;
        $this-> votos = $votos;
    }


    
        function pintarPeliculas($datosPeliculas){
            
            foreach($datosPeliculas as $pelicula){
                echo '<div class="contenedorPeliculas">';

                    echo '<div class="primera_columna">';
                        
                        echo '<div class="contenedorImagen">';
                            echo '<h2>'.$pelicula->titulo.'</h2>';
                            echo '<img class="imagenes" src="'.$pelicula->imagen.'" alt="imagen de la pelicula">';
                            echo '<p>Duración: '.$pelicula->duracion.' minutos</p>';
                        echo '</div>';

                    echo '</div>';
        
                    echo '<div class="segunda_columna">';

                        echo '<div class="contenedorSinopsis">';
                            echo '<p class="votos">Votos: '.$pelicula->votos.'</p>';
                            echo '<p class="subtitulo">SINOPSIS:</p>';
                            echo "<p>$pelicula->sinopsis</p>";
                            echo '<i class="bi bi-arrow-right-square-fill"><a href="ficha.php" class="enlaceFicha"> Ver ficha</a></i>';
                        echo '</div>';
                            
                    echo '</div>';

                echo '</div>';

            }
        }
        
        function obtenerPeliculasPorCategoria($categoria){

            $conexion = mysqli_connect('localhost', 'root', '1234');

            if(mysqli_connect_errno()){
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
    
            mysqli_select_db($conexion, 'cartelera');

            $id_categoria = $_GET['id_categoria'];
            $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
            $consulta =  "SELECT titulo, año, duracion, sinopsis, imagen, votos, id_categoria FROM t_peliculas WHERE id_categoria = '" . $sanitized_categoria_id . "';";
            

            $resultado = mysqli_query($conexion, $consulta);

            $datosPeliculas = [];
            $i = 0;
    
            if (!$resultado){
                $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                $mensaje = 'Consulta realitzada: ' . $consulta;
                die($mensaje);
            }else{
                if(($resultado->num_rows) > 0){

                    while($registro = mysqli_fetch_assoc($resultado) ){
                        $pelicula1 = new Pelicula();
                        $pelicula1->init($registro['id_categoria'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'], $registro['votos']);
    
                        $datosPeliculas[$i] = $pelicula1;
        
                        $i++;
                    }

                }else{
                    echo "No hay resultados";
                }

                return $datosPeliculas;
            }
        }

        function obtenerDatosFicha(){

            $conexion = mysqli_connect('localhost', 'root', '1234');

            if(mysqli_connect_errno()){
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
    
            mysqli_select_db($conexion, 'cartelera');

            $id_categoria = $_GET['id_categoria'];
            $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
            $consulta =  "SELECT titulo, año, duracion, sinopsis, imagen, votos, id_categoria FROM t_peliculas WHERE id_categoria = '" . $sanitized_categoria_id . "';";
            

            $resultado = mysqli_query($conexion, $consulta);

            $datosPeliculas = [];
            $i = 0;
    
            if (!$resultado){
                $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                $mensaje = 'Consulta realitzada: ' . $consulta;
                die($mensaje);
            }else{
                if(($resultado->num_rows) > 0){

                    while($registro = mysqli_fetch_assoc($resultado) ){
                        $pelicula1 = new Pelicula();
                        $pelicula1->init($registro['id_categoria'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'], $registro['votos']);
    
                        $datosPeliculas[$i] = $pelicula1;
        
                        $i++;
                    }

                }else{
                    echo "No hay resultados";
                }

                return $datosPeliculas;
            }
        }

        function pintarFicha(){

        }

        
}