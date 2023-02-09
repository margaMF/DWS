<?php
    class DirrecionIPAccesoDatos{
        function __construct(){
        }

        function obtener(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()){
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'BD_Direcciones');
            $consulta = mysqli_prepare($conexion, "SELECT ID, IP FROM direcciones_ip;");
            $consulta->execute();
            $result = $consulta->get_result();

            $ips =  array();

            while ($myrow = $result->fetch_assoc()) {
                array_push($ips,$myrow);

            }
            return $ips;
        }

        function obtenerDireccionesIPBloqueadas(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()){
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'BD_Direcciones');
            $consulta = mysqli_prepare($conexion, "SELECT ID, IP FROM direcciones_ip;");
            $consulta->execute();
            $result = $consulta->get_result();

            $ipsBloqueadas =  array();

            while ($myrow = $result->fetch_assoc()) {
                array_push($ipsBloqueadas,$myrow);

            }
            return $ipsBloqueadas;
        }
    }
