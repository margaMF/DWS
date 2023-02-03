<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de torneos</title>
        <link rel="stylesheet" href="../../css/torneosVista.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor">
            <div class="menu">
                <div class="contenedorBotones">
                    <a href="logout"  class="botonSesion">Cerrar sesión</a>
                </div>
            </div>

            <div class="enlaceCrearTorneo">
                <a href="gestionTorneosVista.php">Crear torneo</a>
            </div>
           
            <?php
                require_once("../Negocio/torneosReglasNegocio.php");
                require_once("../Negocio/jugadoresReglasNegocio.php");

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
                    <th>Campeón</th>
                    <th></th>
                </tr>
                
                <?php 
                    foreach ($datosTorneos as $torneo){
                        echo "<tr>";
                            echo "<td>".$torneo->getID()."</td>";
                            echo "<td>".$torneo->getNombre()."</td>";
                            echo "<td>".$torneo->getFecha()."</td>";
                            echo "<td>".$torneo->getEstado()."</td>";
                            echo "<td>-</td>";
                            echo "<td>";
                                echo "<a href='gestionTorneosVistaEdicion.php?ID='".$torneo->getID()."' class='enlacesEdicion'>Editar</a>";
                                echo "<a href='' class='enlacesEdicion'>Borrar</a>";
                            echo "</td>";
                        echo "</tr>";  
                    }
                ?>

            </table>
        <div>
    </body>
</html>