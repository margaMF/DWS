<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("../Infraestructura/jugadoresAccesoDatos.php");

    class JugadoresReglasNegocio{
        private $_ID;
        private $_Nombre;

        function __construct(){
        }

        function init($id, $nombre){
            $this->_ID = $id;
            $this->_Nombre = $nombre;
        }

        function getID(){
            return $this->_ID;
        }

        function getNombre(){
            return $this->_Nombre;
        }

        function obtener(){
            $jugadoresDAL = new JugadoresAccesoDatos();
            $rs = $jugadoresDAL->obtener();

            $listaJugadores =  array();

            foreach ($rs as $jugadorDatos){
                $oJugadorReglasNegocio = new JugadoresReglasNegocio();
                $oJugadorReglasNegocio->Init($jugadorDatos['ID'], $jugadorDatos['Nombre']);
                array_push($listaJugadores,$oJugadorReglasNegocio);
            }
            
            return $listaJugadores;
            
        }

        function buscarJugador($id){
            $jugadores = $this->obtener();

            foreach($jugadores as $jugador){
                if($jugador-> _ID == $id){
                    return $jugador;
                }
            }
        } 
    }