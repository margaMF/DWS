<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("../AccesoDatos/DireccionIPAccesoDatos.php");

class DireccionIPReglasNegocio{
    private $ID;
    private $IP;

    function __construct(){
    }

    function init($id, $ip){
        $this->ID = $id;
        $this->IP = $ip;
    }

    function getID(){
        return $this->ID;
    }

    function getIP(){
        return $this->IP;
    }

    function limpiar(){

        $direccionesIP = new DirrecionIPAccesoDatos();
        $resultado = $direccionesIP->obtener();

        $direccionesIPBloq = new DirrecionIPAccesoDatos();
        $resultadoBloq = $direccionesIPBloq->obtenerDireccionesIPBloqueadas();



    }

    function validarDigito($digito)
{
    $longitud = strlen($digito);
    $result = true;
    for ($i = 0; $i < $longitud; $i++)
    {
        print($digito[$i]);
        if ($digito[$i]!="0" && $digito[$i]!="1")
        {
            $result = false;
            break;
        }
    }
    return $result;

}

function validarIP($ip)
{
    $longitud = strlen($ip);
    if ($longitud!=35)
    {
        return false;
    }
    $result = true;
    $digitos = explode(".", $ip);
    foreach ($digitos as $digito)
    {
        if (!validarDigito($digito))
        {
            $result = false;
            break;
        }
    }
    return $result;
}

function convertirNumeroBinarioDecimal($numero)
{
    $cadena = strrev($numero);
    $n = strlen($numero)-1;

    $i = 0;
    $resultado = 0;
    for ($i = 0; $i <= $n; $i++)
    {
        $resultado = $resultado + ((2**$i) * $cadena[$i]);
    }

    return $resultado;
}

function convertIP($ipbinario)
{
    $digitos = explode(".", $ipbinario);
    $resultado = "";
    $i = 1;
    foreach ($digitos as $digito)
    {
        if ($i<4)
        {
            $resultado = $resultado.convertirNumeroBinarioDecimal($digito).".";
        }
        else
        {
            $resultado = $resultado.convertirNumeroBinarioDecimal($digito);
        }
        $i++;
    }
    return $resultado;
}
}

