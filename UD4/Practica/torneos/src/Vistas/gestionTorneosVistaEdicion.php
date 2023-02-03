<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de torneos</title>
        <link rel="stylesheet" href="../../css/gestionTorneosVistaEdicion.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor">
            <div class="menu">
                <div class="contenedorBotones">
                    <a href="logout"  class="botonSesion">Cerrar sesión</a>
                </div>
            </div>

            <div class="enlacePartidoNuevo">
                <a href="resultadoPartidaVista.php">Nuevo partido</a>
            </div>
           
            <?php
                require_once("../Negocio/partidoReglasNegocio.php");
                require_once("../Negocio/jugadoresReglasNegocio.php");

                $partidos = new PartidosReglasNegocio();
                $datosPartidos = $partidos->obtener();

                $contadorRegistros = count($datosPartidos);

                $jugadores = new JugadoresReglasNegocio();

                echo "<h1>Número de egistros: ".$contadorRegistros."</h1>";
            ?>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Jugador A</th>
                    <th>Jugador B</th>
                    <th>Ronda</th>
                    <th>Ganador</th>
                    <th></th>
                </tr>
                
                <?php 
                    $idJugador = $_GET['ID'];
                    $jugador = $jugadores->buscarJugador($idJugador);
                    
                    foreach ($datosPartidos as $partido){
                        echo "<tr>";
                            echo "<td>".$partido->getID()."</td>";

                            $idjugadorA = $partido->getJugadorA();
                            $jugadorA = $jugadores->buscarJugador($idjugadorA);
                            echo "<td>".$jugadorA->getNombre()."</td>";

                            $idjugadorB = $partido->getJugadorB();
                            $jugadorB = $jugadores->buscarJugador($idjugadorB);
                            echo "<td>".$jugadorB->getNombre()."</td>";

                            echo "<td>".$partido->getRonda()."</td>";

                            echo "<td>".$partido->getGanador()."</td>";
                            
                            echo "<td>";
                                echo "<a href='' class='enlacesEdicion'>Editar</a>";
                                echo "<a href='' class='enlacesEdicion'>Borrar</a>";
                            echo "</td>";
                        echo "</tr>";  
                    }
                ?>

            </table>
        <div>
    </body>
</html>