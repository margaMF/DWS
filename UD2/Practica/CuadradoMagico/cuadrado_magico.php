<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadrado Mágico</title>
    <link rel="stylesheet" href="css/estilos_cuadrado_magico.css">
</head>
<body>
    <h1>CUADRADO MÁGICO</h1>

        <?php
            ini_set('display_errors', 'On');
            ini_set('html_errors', 0); 

            $numeros = array(
                array(4, 5, 2),
                array(3, 5, 7),
                array(8, 1, 6)
            );

            $max_filas = count($numeros);

            for ($fila = 0; $fila < $max_filas; $fila++){
                
                $max_columna_fila = array_sum($numeros[$fila]);
                echo "Fila $fila = ".$max_columna_fila."<br>";
            }

            /*
            function analizarCuadradoMagico($numeros){

            }

            function sumarFilas($numeros){
                $max_filas = count($numeros);

                for ($fila = 0; $fila < $max_filas; $fila++){
                    echo"Fila $fila";
                    $max_columna_fila = array_sum($numeros[$fila]);
                    echo $max_columna_fila;
                }

            }

            function sumarColumnas($numeros){
                $max_columnas = count($numeros);

                for ($fila = 0; $fila < $max_filas; $fila++){
                    echo"Fila $fila";
                    $max_columna_fila = array_sum($numeros[$fila]);
                    echo $max_columna_fila;
                }

            }


            function pintarCuadradoMagico(){
            /*
                <table>
                    <tr>
                        <td>4</td>
                        <td>9</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>5</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>1</td>
                        <td>6</td>
                    </tr>
                </table>
            
            }
            */


        ?>

    
</body>
</html>