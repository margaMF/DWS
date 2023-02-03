<?php

    class jugadoresAccesoDatos{
        
        function __construct(){
        }

        function obtener(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()){
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'BD_Torneos');
            $consulta = mysqli_prepare($conexion, "SELECT ID, Nombre FROM T_JUGADOR;");
            $consulta->execute();
            $result = $consulta->get_result();

            $jugadores =  array();

            while ($myrow = $result->fetch_assoc()) {
                array_push($jugadores,$myrow);

            }
            return $jugadores;
        }
    }