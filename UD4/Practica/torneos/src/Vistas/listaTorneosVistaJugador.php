<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de torneos</title>
        <link rel="stylesheet" href="../../css/listaTorneosVistaJugador.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor">

            <div class="menu">
                <div class="contenedorBotones">
                    <a href="logout"  class="botonSesion">Cerrar sesión</a>
                </div>
            </div>

            

            <div class="contenedorTabla">

                <?php
                    require("../Negocio/torneosReglasNegocio.php");

                    $torneosBL = new TorneosReglasNegocio();
                    $datosTorneos = $torneosBL->obtener();

                    $contadorRegistros = count($datosTorneos);

                    echo "<h1>Número de egistros: ".$contadorRegistros."</h1>";
                ?>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del torneo</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Jugadores</th>
                        <th>Campeón</th>
                    </tr>

                    <?php 
                        foreach ($datosTorneos as $torneo){
                            $idTorneo = $torneo->getID();
                            echo "<tr>";
                                echo "<td>".$torneo->getID()."</td>";
                                echo "<td><a href='cuadroTorneos.php?ID=$idTorneo'>".$torneo->getNombre()."</a></td>";
                                echo "<td>".$torneo->getFecha()."</td>";
                                echo "<td>".$torneo->getEstado()."</td>";
                                echo "<td>".$torneo->getJugadores()."</td>";
                                echo "<td>-</td>";
                            echo "</tr>";  
                        }
                    ?>

                </table>
            </div>            
        <div>
    </body>
</html>