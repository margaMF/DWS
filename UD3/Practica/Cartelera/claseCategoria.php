<?php

class categoria{

    function __construct(){

    }

    function init($id, $nombre){
        $this-> id = $id;
        $this-> nombre = $nombre;
    }

    function pintarCategoria($datosCategoria){
        
        foreach($datosCategoria as $categoria){

            echo '<a href="peliculas.php?id_categoria='.$categoria->id.'" class="botonCategorias">'. $categoria->nombre.'</a>';
                        
        }

    }

    function obtenerDatos(){
        
        $conexion = mysqli_connect('localhost', 'root', '1234');

        if(mysqli_connect_errno()){
            echo "Error al conectar a MySQL: ". mysqli_connect_error();
        }

        mysqli_select_db($conexion, 'cartelera');

        $consulta =  "SELECT id, nombre FROM t_categoria;";

        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado){
            $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
            $mensaje = 'Consulta realitzada: ' . $consulta;
            die($mensaje);
        }else{
            if(($resultado->num_rows) > 0){
                $i = 0;

                while($registro = mysqli_fetch_assoc($resultado) ){
                    $categoria1 = new Categoria();
                    $categoria1->init($registro['id'], $registro['nombre']);

                    $datosCategoria[$i] = $categoria1;

                    $i++;
                }

            }else{
                echo "No hay resultados";
            }

            return $datosCategoria;
        }
        
    }

}
