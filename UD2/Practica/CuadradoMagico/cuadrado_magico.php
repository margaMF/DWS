<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadrado Mágico</title>
    <link rel="stylesheet" href="css/estilos_cuadrado_magico.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    <h1>CUADRADO MÁGICO</h1>

        <?php
            ini_set('display_errors', 'On');
            ini_set('html_errors', 0);
            
            require("cuadrado.php");

            $numeros = array(
                array(4, 9, 2),
                array(3, 5, 7),
                array(8, 1, 6)
            );

            /*Comentado para poder ejecutar el archivo de test_cuadrado*/
            //$cuadradoMagico = analizarCuadradoMagico($numeros);
            //pintarCuadradoMagico($cuadradoMagico);

           
            function analizarCuadradoMagico($numeros){
                $sumarFilas = sumarFilas($numeros);
                $sumarColumnas = sumarColumnas($numeros);
                $sumarDiagonales = sumarDiagonales($numeros);

                $resultadoFila1 = 0;
                $contador = 3;

                for($i = 0; $i < $contador; $i++){
                    $resultadoFila1 = $resultadoFila1 + $numeros[0][$i];
                }

                $esCuadradoMagico = true;
                $contador = count($sumarFilas);

                for($i = 0; $i < $contador; $i++){
                    if($resultadoFila1 != $sumarFilas[$i]){
                        $esCuadradoMagico = false;
                    }
                    if($resultadoFila1 != $sumarColumnas[$i]){
                        $esCuadradoMagico = false;
                    }

                }

                $contadorDiagonales = count($sumarDiagonales);

                for($i = 0; $i < $contadorDiagonales; $i++){
                    if($resultadoFila1 != $sumarDiagonales[$i]){
                        $esCuadradoMagico = false;
                    }
                }

                $cuadradoMagico = new CuadradoMagico($numeros, $sumarFilas, $sumarColumnas, $sumarDiagonales, $esCuadradoMagico, $resultadoFila1);
                return $cuadradoMagico;
                
            }

            function sumarFilas($numeros){
                $max_filas = count($numeros);
                $arrayResultado = [];

                for ($i = 0; $i < $max_filas; $i++){
                    $sumaFilas = array_sum($numeros[$i]);
        
                    array_push($arrayResultado, $sumaFilas);
                   
                }
                return $arrayResultado;
            }

            function sumarColumnas($numeros){
            $max_filas = count($numeros);
            $arrayResultado = [];
            
                for ($i = 0; $i < $max_filas; $i++){
                    $resultado = 0;
                    $sumaFilas = count($numeros[$i]);
                    for ($j = 0; $j < $max_filas; $j++){
                        $total = $numeros[$j][$i];
                        $resultado = $resultado + $total;
                        
                    }
                    array_push($arrayResultado, $resultado);
                }
                return $arrayResultado;

            }

            function sumarDiagonales($numeros){
                $primera_diagonal = 0;
                $segunda_diagonal = 0;
                $contador = count($numeros) -1;
                $arrayResultado = [];

                for($i = 0; $i <= $contador; $i++){
                    $primera_diagonal = $primera_diagonal + $numeros[$i][$contador - $i];
                    $segunda_diagonal = $segunda_diagonal + $numeros[$i][$i];
                }

                array_push($arrayResultado, $primera_diagonal);
                array_push($arrayResultado, $segunda_diagonal);

                return $arrayResultado;

            }


            function pintarCuadradoMagico($cuadradoMagico){

                $contador = count($cuadradoMagico->sumarFilas);
                echo "<table>";
                    for($i = 0; $i < $contador; $i++){
                        echo "<tr>";
                        for($j = 0; $j < $contador; $j++){
                            echo "<td>".$cuadradoMagico->numeros[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                echo "</table>";


                if($cuadradoMagico->esCuadradoMagico == true){
                    echo "<p class = 'verdadero'>¡ES UN CUADRADO MÁGICO!</p>";
                }else{
                    echo "<p class = 'falso'>NO ES UN CUADRADO MÁGICO</p>";

                    echo "<div class= 'contenedor'><p>Respeto a la suma de la primera fila que es ".$cuadradoMagico->resultadoFila1.",</p>";
                    echo "<p>Las filas diferentes a ".$cuadradoMagico->resultadoFila1." son:</p>";
                    for($i = 0; $i < $contador; $i++){
                        if($cuadradoMagico->sumarFilas[$i] != $cuadradoMagico->resultadoFila1){
                            echo "<p>Fila ".($i+1)."</p>";
                        }
                    }
    
                    echo "<p>Las columnas diferentes a ".$cuadradoMagico->resultadoFila1." son:</p>";
                    for($i = 0; $i < $contador; $i++){
                        if($cuadradoMagico->sumarColumnas[$i] != $cuadradoMagico->resultadoFila1){
                            echo "<p>Columna ".($i+1)."</p>";
                        }
                    }
    
                    echo "<p>Las diagonales diferentes a ".$cuadradoMagico->resultadoFila1." son:</p>";
                    if($cuadradoMagico->sumarDiagonales[0] != $cuadradoMagico->resultadoFila1){
                            echo "<p>Primera diagonal</p>";
                    }
                    if($cuadradoMagico->sumarDiagonales[1] != $cuadradoMagico->resultadoFila1){
                        echo "<p>Segunda diagonal</p>";
                    }
                    
                    echo"</div>";
                }
                           
            }
            

        ?>

    
</body>
</html>