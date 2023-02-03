<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de torneos</title>
        <link rel="stylesheet" href="../../css/jugadorVista.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor">
            <div class="menu">
                <div class="contenedorBotones">
                    <a href="logout"  class="botonSesion">Cerrar sesión</a>
                </div>
            </div>

            <div class="contenedorFicha">
                <h1>Ficha</h1>
                <div class="columna">

                    <div class="ColA">
                        <p>Nombre:</p>
                        <p>Total de partidos jugados:</p>
                        <p>Partidos ganados:</p>
                        <p>Porcentaje de victorias:</p>
                        <p>Total de torneos disputados:</p>
                        <p>Torneos ganados:</p>
                    </div>

                    <div class="ColB">

                        <?php 
                                require("../Negocio/jugadoresReglasNegocio.php");

                                $jugadores = new JugadoresReglasNegocio();
                                $datosJugadores = $jugadores->obtener();

                                $idJugador = $_GET['ID'];
                                $jugador = $jugadores->buscarJugador($idJugador);

                                echo "<p>".$jugador->getNombre()."</p>";
                                echo "<p></p>";
                                echo "<p></p>";
                                echo "<p></p>";
                                echo "<p></p>";
                                echo "<p></p>";
                                
                        ?>

                    </div>
            </div>

            </div>
        <div>
    </body>
</html>
