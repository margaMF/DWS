<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("calculadora.php");

    $numero1 = 7;
    $numero2 = 5;
    $cadenaBits = array(1, 0, 0, 0);
    $arrayNumeros = array(2, 4, 3);
    

    $Calculadora = new Calculadora();

    echo "EJERCICIO 1: <br>";
    echo "El factorial de ".$numero1." es ".$Calculadora->resultadoFactorial($numero1).".";
    echo "<br> El factorial de ".$numero2." es ".$Calculadora->resultadoFactorial($numero2).".";


    $Calculadora2 = new Calculadora();
    
    echo "<br><br>EJERCICIO 2:";
    echo " <br> El coeficiente binomial de " . $numero1 . " y " . $numero2 . " es " . $Calculadora->coeficienteBinomial($numero1, $numero2).".";


    $Calculadora3 = new Calculadora();

    echo "<br><br>EJERCICIO 3:<br>";
    echo "El número decimal de la cadena introducida es: ".$Calculadora->convierteBinarioDecimal($cadenaBits).".";

    $Calculadora4 = new Calculadora();

    echo "<br><br>EJERCICIO 4:<br>";
    echo "La suma de los números pares introducidos es: ".$Calculadora->sumaNumerosPares($arrayNumeros).".";






