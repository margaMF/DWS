<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("../Infraestructura/torneosAccesoDatos.php");

    class TorneosReglasNegocio{
        private $_ID;
        private $_Nombre;
        private $_Fecha;
        private $_Estado;
        private $_Jugadores;

        function __construct(){
        }

        function init($id, $nombre, $fecha, $estado, $jugadores){
            $this->_ID = $id;
            $this->_Nombre = $nombre;
            $this->_Fecha = $fecha;
            $this->_Estado = $estado;
            $this->_Jugadores = $jugadores;
        }

        function getID(){
            return $this->_ID;
        }

        function getNombre(){
            return $this->_Nombre;
        }

        function getFecha(){
            return $this->_Fecha;
        }

        function getEstado(){
            return $this->_Estado;
        }

        function getJugadores(){
            return $this->_Jugadores;
        }

        function obtener(){
            $torneosDAL = new TorneosAccesoDatos();
            $rs = $torneosDAL->obtener();

            $listaTorneos =  array();

            foreach ($rs as $torneo){
                $oTorneosReglasNegocio = new TorneosReglasNegocio();
                $oTorneosReglasNegocio->Init($torneo['ID'], $torneo['Nombre'], $torneo['Fecha'], $torneo['Estado'], $torneo['Jugadores']);
                array_push($listaTorneos,$oTorneosReglasNegocio);
            }
            
            return $listaTorneos;
            
        }
    }