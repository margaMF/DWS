<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="votos.css">
    <title>Votos</title>
</head>
<body>

    <div class="contenedor">

            <?php 
                $conexion = mysqli_connect('localhost', 'root', '1234');

                if(mysqli_connect_errno()){
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
                }

                mysqli_select_db($conexion, 'cartelera');

                $id_pelicula = $_POST['id_pelicula'];
                $sanitized_pelicula_id = mysqli_real_escape_string($conexion, $id_pelicula);
                $consulta = "UPDATE t_peliculas 
                SET 
                    votos = votos + 1
                WHERE
                    ID =".$sanitized_pelicula_id.";";
                

                $resultado = mysqli_query($conexion, $consulta);

                if($resultado){
                        echo '<p>¡Ha registrado su voto correctamente!</p>';
                }else{
                        echo '<p>No se ha podido registrar su voto...</p>';
                }
            ?>
            
            <a href="categorias.php">Volver al inicio</a>

    </div>
    
</body>
</html>