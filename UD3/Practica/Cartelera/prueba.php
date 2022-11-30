<?php 

$conexion = mysqli_connect('localhost', 'root', '1234');

mysqli_select_db($conexion, 'cartelera');

$consulta = "SELECT * FROM t_peliculas;";

$resultado = mysqli_query($conexion, $consulta);

if (!$resultado){
    $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
    $mensaje = 'Consulta realitzada: ' . $consulta;
    die($mensaje);
}else{
    echo "conexión OK"."<br>";

    while($registro = mysqli_fetch_assoc($resultado) ){
        
        echo $registro['titulo']."<br>";
    }
}
?>
