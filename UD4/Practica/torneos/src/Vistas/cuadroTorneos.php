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
            <h1>Torneo de prueba 2023</h1>
            <div class="contenedorTabla">

                <div class='columnas'>
                    <h2>CUARTOS</h2>
                    <?php 
                        require("../Negocio/jugadoresReglasNegocio.php");

                        $jugadores = new JugadoresReglasNegocio();
                        $datosJugadores = $jugadores->obtener();

                        foreach ($datosJugadores as $jugador){
                            $idJugador = $jugador->getID();
                            echo "<div class='parejas'>";

                                echo "<div class='contJugador'>";
                                        echo "<a href='jugadorVista.php?ID=$idJugador'>".$jugador->getNombre()."</a>";
                                echo "</div>";

                            echo "</div>";
                        }
                    ?>
                </div>

                <div class="columnas">
                    <h2>SEMIFINAL</h2>
                    <div class='espacioColSemiF'>
                        <?php 
                            foreach ($datosJugadores as $jugador){
                                echo "<div class='contJugador'>";
                                    //Recoger el ID del jugador y pasarla a la url por post
                                    // echo "<a href=''>".$jugador->getNombre()."</a>"; CAMBIAAAAAAAAAAAAR
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>

                <div class="columnas">
                    <h2>FINAL</h2>
                    <div class='espacioColSemiF'>
                        <?php 
                            foreach ($datosJugadores as $jugador){
                                echo "<div class='contJugador'>";
                                    // echo "<a href=''>".$jugador->getNombre()."</a>"; CAMBIAAAAAAAAAAAAR
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>

                <div class="columnas">
                    <h2>CAMPEÓN</h2>
                    <div class='espacioColSemiF'>
                        <?php 
                            foreach ($datosJugadores as $jugador){
                                echo "<div class='contJugador'>";
                                    // echo "<a href=''>".$jugador->getNombre()."</a>"; CAMBIAAAAAAAAAAAAR
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>

            </div>
        <div>
    </body>
</html>
