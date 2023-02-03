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
                        require_once("../Negocio/torneosReglasNegocio.php");


                        $jugadores = new JugadoresReglasNegocio();
                        $datosJugadores = $jugadores->obtener();

                        $torneo = new TorneosReglasNegocio();

                        $id_torneo = $_GET['ID'];

                        $partido = new PartidosReglasNegocio();

                        $partidoCuartos = $partido->buscarPartidosPorRonda($id_torneo, "Cuartos");

                        $partidoSemi = $partido->buscarPartidosPorRonda($id_torneo, "Semifinales"); 
                  

                        $partidoFinales = $partido->buscarPartidosPorRonda($id_torneo, "Final");

                        foreach ($partidoCuartos as $partido){

                            $idjugadorA = $partido->getJugadorA();
                            $jugadorA = $jugadores->buscarJugador($idjugadorA);

                            $idjugadorB = $partido->getJugadorB();
                            $jugadorB = $jugadores->buscarJugador($idjugadorB);

                            $nombreA = $jugadorA->getNombre();
                            $nombreB = $jugadorB->getNombre();

                            echo "<div class='parejas'>";

                                echo "<div class='contJugador'>";
                                        echo "<a href='jugadorVista.php?ID=$idjugadorA'>$nombreA</a>";
                                echo "</div>";

                                echo "<div class='contJugador'>";
                                        echo "<a href='jugadorVista.php?ID=$idjugadorB'>$nombreB</a>";
                                echo "</div>";

                            echo "</div>";
                        }
                    ?>
                </div>

                <div class="columnas">
                    <h2>SEMIFINAL</h2>
                    <?php
                       echo "<div class='espacioColSemiF'>";
                            foreach ($partidoSemi as $partidoS){
                            $idjugadorA = $partidoS->getJugadorA();
                            $jugadorA = $jugadores->buscarJugador($idjugadorA);

                            $idjugadorB = $partidoS->getJugadorB();
                            $jugadorB = $jugadores->buscarJugador($idjugadorB);

                            $nombreA = $jugadorA->getNombre();
                            $nombreB = $jugadorB->getNombre();

                            echo "<div class='contJugadorSemiF1'>";
                                    echo "<a href='jugadorVista.php?ID=$idjugadorA'>$nombreA</a>";
                            echo "</div>";

                            echo "<div class='contJugadorSemiF2'>";
                                    echo "<a href='jugadorVista.php?ID=$idjugadorB'>$nombreB</a>";
                            echo "</div>";                                
                            }
                        echo "</div>";
                    ?>
                </div>

                <div class="columnas">
                    <h2>FINAL</h2>
                    <?php
                        echo"<div class='espacioColFinal'>";
                            foreach ($partidoFinales as $partidoF){
                                $idjugadorA = $partidoF->getJugadorA();
                                $jugadorA = $jugadores->buscarJugador($idjugadorA);

                                $idjugadorB = $partidoF->getJugadorB();
                                $jugadorB = $jugadores->buscarJugador($idjugadorB);

                                $nombreA = $jugadorA->getNombre();
                                $nombreB = $jugadorB->getNombre();

                                echo "<div class='contJugador'>";
                                        echo "<a href='jugadorVista.php?ID=$idjugadorA'>$nombreA</a>";
                                echo "</div>";

                                echo "<div class='contJugadorF2'>";
                                        echo "<a href='jugadorVista.php?ID=$idjugadorB'>$nombreB</a>";
                                echo "</div>";
                                }
                        echo "</div>";
                    ?>
                </div>

                <div class="columnas">
                    <h2>CAMPEÓN</h2>
                    <div class='espacioColSemiF'>
                        <?php 
                            
                            echo "<div class='contJugador'>";
                                echo "<a href=''></a>";
                            echo "</div>";
                        ?> 
                    </div>
                </div>

            </div>
        <div>
    </body>
</html>
