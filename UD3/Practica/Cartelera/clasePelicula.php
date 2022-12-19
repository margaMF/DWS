<?php

class Pelicula{

    function __construct(){

    }
    
    function init($id, $id_categoria, $titulo, $año, $duracion, $sinopsis, $imagen, $votos){
        $this-> id = $id;
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
                            echo '<p>'.$pelicula->sinopsis.'</p>';
                            echo '<i class="bi bi-arrow-right-square-fill">
                            <a class="enlaceFicha" href="ficha.php?id_pelicula='.$pelicula->id.'&id_categoria='.$pelicula->id_categoria.'"> Ver ficha</a></i>';
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
            $consulta =  "SELECT titulo, año, duracion, sinopsis, imagen, votos, id_categoria, ID FROM t_peliculas WHERE id_categoria = '" . $sanitized_categoria_id . "';";
            

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

                    $pelicula1->init($registro['ID'], $registro['id_categoria'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'], $registro['votos']);
    
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

            $id_pelicula = $_GET['id_pelicula'];
            $sanitized_pelicula_id = mysqli_real_escape_string($conexion, $id_pelicula);
            $consulta = "SELECT 
                t_peliculas.titulo,
                t_peliculas.año,
                t_peliculas.duracion,
                t_peliculas.sinopsis,
                t_peliculas.imagen,
                t_peliculas.votos,
                t_peliculas.id_categoria,
                t_peliculas.ID,
                t_actor.nombre as actor,
                t_director.nombre as director
            FROM
                t_actor_pelicula
                    INNER JOIN
                t_actor ON t_actor.ID = t_actor_pelicula.id_actor
                    INNER JOIN
                t_peliculas ON t_peliculas.id = t_actor_pelicula.id_pelicula
                    INNER JOIN
                t_director ON t_director.ID = t_peliculas.id_director
            WHERE
                t_peliculas.id = '". $sanitized_pelicula_id . "';";
            

            $resultado = mysqli_query($conexion, $consulta);
    
            if (!$resultado){
                $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                $mensaje = 'Consulta realitzada: ' . $consulta;
                die($mensaje);
            }else{
                if(($resultado->num_rows) > 0){

                    $registro = mysqli_fetch_assoc($resultado);
                        

                        echo '<div class="contenedorPeliculas">';
                
                        echo '<div class="primera_columna">';
                            echo '<div class="contenedorImagen">';
                            echo '<h2>'.$registro['titulo'].'</h2>';
                            echo '<img src="'.$registro['imagen'].'" alt="imagen pelicula" class="imagenes">';
                            echo '</div>';
                        echo '</div>';

                        echo '<div class="segunda_columna">';
                        echo '<div class="contenedorSinopsisFicha">';
                                echo '<p class="votos">Votos: '.$registro['votos'].'</p>';
                                echo '<p class="titulosDatosFicha">Duración: '.$registro['duracion'].' minutos.</p>';
                                echo '<p class="titulosDatosFicha">Año: ' .$registro['año'].'</p>';
                                echo '<p class="titulosDatosFicha">Directores/as: '.$registro['director'].'</p>';
                                $nombresActores = ' ';
                                while($registroActores = mysqli_fetch_assoc($resultado)){
                                    $nombresActores = $nombresActores.' '.$registroActores['actor'].' ';
                                }
                                echo '<p class="titulosDatosFicha">Reparto: '.$nombresActores.'</p>';
                                echo '<br>';
                                echo '<p>'.$registro['sinopsis'].'</p>';
                            echo '</div>';
                        echo '</div>';

                    echo '</div>';

                }else{
                    echo "No hay resultados";
                }
            }
        }
}