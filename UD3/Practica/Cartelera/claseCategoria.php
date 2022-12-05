<?php

class categoria{

    function __construct(){

    }

    function init($id, $nombre){
        $this-> id = $id;
        $this-> nombre = $nombre;
    }

    function pintarCategoria(){
        //igual que clasePelicula

    }

    function obtenerDatos(){
        //Igual que clasePelicula
        //select id, nombre from t_categoria;
        
    }

    function validarParametroName(){
        /*
        Probar si funciona sólo con esta línea.
        $name = htmlspecialchars($_GET["name"]);
        */
    }

}
