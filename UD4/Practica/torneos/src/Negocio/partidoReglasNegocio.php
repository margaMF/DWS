<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("../Infraestructura/partidoAccesoDatos.php");

    class PartidosReglasNegocio{
        private $ID;
        private $JugadorA;
        private $JugadorB;
        private $Ganador;
        private $Ronda;
        private $Torneo;

        function __construct(){
        }

        function init($id, $jugadorA, $jugadorB, $ganador, $ronda, $torneo){
            $this->ID = $id;
            $this->JugadorA = $jugadorA;
            $this->JugadorB = $jugadorB;
            $this->Ganador = $ganador;
            $this->Ronda = $ronda;
            $this->Torneo = $torneo;
        }

        function getID(){
            return $this->ID;
        }

        function getJugadorA(){
            return $this->JugadorA;
        }

        function getJugadorB(){
            return $this->JugadorB;
        }

        function getGanador(){
            return $this->Ganador;
        }

        function getRonda(){
            return $this->Ronda;
        }

        function getTorneo(){
            return $this->Torneo;
        }

        function obtener(){
            $partidosDAL = new PartidosAccesoDatos();
            $rs = $partidosDAL->obtener();

            $listaPartidos =  array();

            foreach ($rs as $partidoDatos){
                $oPartidosReglasNegocio = new PartidosReglasNegocio();
                $oPartidosReglasNegocio->Init($partidoDatos['ID'], $partidoDatos['JugadorA'], $partidoDatos['JugadorB'], $partidoDatos['Ganador'], $partidoDatos['Ronda'], $partidoDatos['Torneo']);
                array_push($listaPartidos,$oPartidosReglasNegocio);
            }
            
            return $listaPartidos;
            
        }

        function buscarPartidosPorTorneo($idTorneo){
            $partidos = $this->obtener();

            $arrayPartidos = [];
            foreach($partidos as $partido){
                if($partido->Torneo == $idTorneo){
                    array_push($arrayPartidos, $partido);
                }
            }
            return $arrayPartidos;
        } 

        function buscarPartidosPorRonda($idTorneo, $rondaPartido){
            $partidos = $this->buscarPartidosPorTorneo($idTorneo);

            $arrayPartidosRonda = [];
            foreach($partidos as $partido){
                if($partido->Ronda == $rondaPartido){
                    array_push($arrayPartidosRonda, $partido);
                }
            }

            return $arrayPartidosRonda;
        }
 
    }