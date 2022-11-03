<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("cuadrado_magico.php");

function test_pintarCuadradoMagico_1(){
    $numeros = array(
        array(4, 9, 2),
        array(3, 5, 7),
        array(8, 1, 6)
    );

    $sumarFilas = [15, 15, 15];
    $sumarColumnas = [15, 15, 15];
    $sumarDiagonales = [15, 15, 15];

    $resultadoCorrecto = analizarCuadradoMagico($numeros);
    pintarCuadradoMagico($resultadoCorrecto);
}

function test_pintarCuadradoMagico_2(){
    $numeros = array(
        array(4, 9, 2),
        array(3, 2, 7),
        array(8, 1, 6)
    );

    $sumarFilas = [15, 15, 15];
    $sumarColumnas = [15, 15, 15];
    $sumarDiagonales = [15, 15, 15];

    $resultadoCorrecto = analizarCuadradoMagico($numeros);
    pintarCuadradoMagico($resultadoCorrecto);
}

function test_sumarFilas_1(){
    
    $numeros = array(
        array(4, 9, 2),
        array(3, 5, 7),
        array(8, 1, 6)
    );

    $resultadoCorrecto = [15, 15, 15];

    $resultadoReal = sumarFilas($numeros);

    return ($resultadoReal == $resultadoCorrecto);

}

function test_sumarFilas_2(){
    $numeros = array(
        array(4, 2, 2),
        array(3, 5, 7),
        array(8, 1, 6)
    );

    $resultadoCorrecto = [15, 15, 15];

    $resultadoReal = sumarFilas($numeros);

    return ($resultadoReal == $resultadoCorrecto);
}

function test_sumarColumnas_1(){
    $numeros = array(
        array(4, 9, 2),
        array(3, 5, 7),
        array(8, 1, 6)
    );

    $resultadoCorrecto = [15, 15, 15];

    $resultadoReal = sumarColumnas($numeros);

    return ($resultadoReal == $resultadoCorrecto);
}

function test_sumarDiagonales_1(){
    $numeros = array(
        array(4, 9, 2),
        array(3, 5, 7),
        array(8, 1, 6)
    );

    $resultadoCorrecto = [15, 15];

    $resultadoReal = sumarDiagonales($numeros);

    return ($resultadoReal == $resultadoCorrecto);
}

function test($testEjecutar)
{
    try 
    {
        echo "<br>";
        $resultadoTest = $testEjecutar();
        $mensaje = 'El test: '.$testEjecutar.' ';
        $mensajeResultado = $resultadoTest ? 'OK' : 'KO';
        echo $mensaje.$mensajeResultado;

    }
    catch(Exception $e)
    {
        echo "<br>"."Se ha producido una excepción al ejecutar:".$testEjecutar."<br>";

    } 
}

echo "<br>Test pintar cuadrado mágico</br>";
test("test_pintarCuadradoMagico_1");
test("test_pintarCuadradoMagico_2");

echo "<br><br>Test sumar filas";
test("test_sumarFilas_1");
test("test_sumarFilas_2");

echo "<br><br>Test sumar columnas";
test("test_sumarColumnas_1");

echo "<br><br>Test sumar diagonales";
test("test_sumarDiagonales_1");
