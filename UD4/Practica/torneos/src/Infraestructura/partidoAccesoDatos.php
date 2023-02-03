<?php

    class PartidosAccesoDatos{
        
        function __construct(){
        }

        function obtener(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()){
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'BD_Torneos');
            $consulta = mysqli_prepare($conexion, "SELECT ID, JugadorA, JugadorB, Ganador, Ronda, Torneo FROM t_partido;;");
            $consulta->execute();
            $result = $consulta->get_result();

            $partidos =  array();

            while ($myrow = $result->fetch_assoc()) {
                array_push($partidos,$myrow);

            }
            return $partidos;
        }
    }