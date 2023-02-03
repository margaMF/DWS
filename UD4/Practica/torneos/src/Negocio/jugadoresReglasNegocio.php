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
            $torneosDAL = new JugadoresAccesoDatos();
            $rs = $torneosDAL->obtener();

            $listaTorneos =  array();

            foreach ($rs as $torneo){
                $oTorneosReglasNegocio = new JugadoresReglasNegocio();
                $oTorneosReglasNegocio->Init($torneo['ID'], $torneo['Nombre']);
                array_push($listaTorneos,$oTorneosReglasNegocio);
            }
            
            return $listaTorneos;
            
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