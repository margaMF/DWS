<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de torneos</title>
        <link rel="stylesheet" href="../../css/cuadroTorneos.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor">
            <div class="menu">
                <div class="contenedorBotones">
                    <a href="logout"  class="botonSesion">Cerrar sesión</a>
                </div>
            </div>
            
            <h1>TORNEOS IES SON FERRER</h1>
            
            <div class="contenedorTabla">

                <div class='columnas'>
                    <h2>CUARTOS</h2>
                    <?php 
                        require_once("../Negocio/jugadoresReglasNegocio.php");
                        require_once("../Negocio/partidoReglasNegocio.php");

                        $jugadores = new JugadoresReglasNegocio();
                        $datosJugadores = $jugadores->obtener();

                        $torneo = new TorneosReglasNegocio();

                        $id_torneo = $_GET['ID'];

                        $partido = new PartidosReglasNegocio();
                        //$partidoCuartos = $partido->buscarPartidosPorRonda($id_torneo, "Cuartos");

                        //$partidoSemi = $partido->buscarPartidosPorRonda($id_torneo, "Semifinales"); COMPROBAR NOMBRE!!

                        //$partidoFinales = $partido->buscarPartidosPorRonda($id_torneo, "Finales");

                        foreach ($partidoCuartos as $partido){

                            $idjugadorA = $partido->getJugadorA();

                            $jugadorA = $datosJugadores->buscarJugador($idjugadorA);

                            $idjugadorB = $partido->getJugadorB();

                            $jugadorB = $datosJugadores->buscarJugador($idjugadorB);

                            echo "<div class='parejas'>";

                                echo "<div class='contJugador'>";
                                        echo "<a href='jugadorVista.php?ID=$idJugador'>".$jugadorA->getNombre()."</a>";
                                        echo "<a href='jugadorVista.php?ID=$idJugador'>".$jugadorB->getNombre()."</a>";
                                echo "</div>";

                            echo "</div>";
                        }

                        // foreach ($datosJugadores as $jugador){
                        //     $idJugador = $jugador->getID();

                        
                            
                        //     $partido = $partidos
                           
                        //     $idjugadorA = $jugadores->buscarJugador($idjugadorA);
                        //     echo "<td>".$jugadorA->getNombre()."</td>";

                        //     echo "<div class='parejas'>";

                        //         echo "<div class='contJugador'>";
                        //                 echo "<a href='jugadorVista.php?ID=$idJugador'>".$jugador->getNombre()."</a>";
                        //         echo "</div>";

                        //     echo "</div>";
                        // }
                    ?>
                </div>

                <div class="columnas">
                    <h2>SEMIFINAL</h2>
                    <div class='espacioColSemiF'>
                        <!-- <?php 
                            foreach ($datosJugadores as $jugador){
                                echo "<div class='contJugador'>";
                                    //Recoger el ID del jugador y pasarla a la url por post
                                    // echo "<a href=''>".$jugador->getNombre()."</a>"; CAMBIAAAAAAAAAAAAR
                                echo "</div>";
                            }
                        ?> -->
                    </div>
                </div>

                <div class="columnas">
                    <h2>FINAL</h2>
                    <div class='espacioColSemiF'>
                        <!-- <?php 
                            foreach ($datosJugadores as $jugador){
                                echo "<div class='contJugador'>";
                                    // echo "<a href=''>".$jugador->getNombre()."</a>"; CAMBIAAAAAAAAAAAAR
                                echo "</div>";
                            }
                        ?> -->
                    </div>
                </div>

                <div class="columnas">
                    <h2>CAMPEÓN</h2>
                    <div class='espacioColSemiF'>
                        <!-- <?php 
                            foreach ($datosJugadores as $jugador){
                                echo "<div class='contJugador'>";
                                    // echo "<a href=''>".$jugador->getNombre()."</a>"; CAMBIAAAAAAAAAAAAR
                                echo "</div>";
                            }
                        ?> -->
                    </div>
                </div>

            </div>
        <div>
    </body>
</html>
