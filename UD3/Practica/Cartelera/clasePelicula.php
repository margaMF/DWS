<?php

class pelicula1{
    
    //constructor vacio
    //cambiar a function init();
    function __construct($categoria, $titulo, $año, $duracion, $sinopsis, $imagen, $votos){
        $this-> categoria = $categoria;
        $this-> titulo = $titulo;
        $this-> año = $año;
        $this-> duracion = $duracion;
        $this-> sinopsis = $sinopsis;
        $this-> imagen = $imagen;
        $this-> votos = $votos;
    }

    
    function pintarPeliculas($datosPeliculas){
        /*hacer un array peliculas, instanciar distintas peliculas y gurdarlas en un array, imprimir el array*/
        
        foreach($datosPeliculas as $pelicula){
            echo '<div class="contenedorPeliculas">';

                echo '<div class="primera_columna">';
                    
                    echo '<div class="contenedorImagen">';
                        echo $pelicula->titulo;
                        echo $pelicula->$imagen;
                        echo $pelicula->$duracion;
                    echo '</div>';

                echo '</div>';
    
                echo '<div class="segunda_columna">';

                    echo '<div class="contenedorSinopsis">';
                        echo $pelicula->$votos;
                        echo '<p class="subtitulo">SINOPSIS:</p>';
                        echo $pelicula->$sinopsis;
                        echo '<i class="bi bi-arrow-right-square-fill"><a href="" class="enlaceFicha"> Ver ficha</a></i>';
                    echo '</div>';
                        
                echo '</div>';

            echo '</div>';

        }
        
        function obtenerDatos($categoria){

            //cambiar por la version 2

            $conexion = mysqli_connect('localhost', 'root', '1234');
    
            mysqli_select_db($conexion, 'cartelera');
    
            $consulta = "SELECT titulo, año, duracion, sinopsis, imagen, votos, id_categoria FROM t_peliculas WHERE id_categoria = 2;";
    
            $resultado = mysqli_query($conexion, $consulta);
    
            if (!$resultado){
                $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                $mensaje = 'Consulta realitzada: ' . $consulta;
                die($mensaje);
            }else{
                echo "conexión OK"."<br>";  
    
                $i = 0;
    
                while($registro = mysqli_fetch_assoc($resultado) ){

                    /*$categoria, $titulo, $año, $duracion, $sinopsis, $imagen, $votos*/
                    
                    $datosPeliculas[$i] = new Pelicula($registro['id_categoria'], $registro['titulo'], $registro['año'], $registro['duracion'], $registro['sinopsis'], $registro['imagen'], $registro['votos'], );
                    
                    $i++;
                }

                return $datosPeliculas;
            }
        }
        /*
        $categoria = 2;
        $pelicula = obtenerDatos($categoria);
        var_dump($pelicula);*/

    }

}