<?php

class TeamView {

    function showTeams($teams) {
        include 'templates/header.php';
        include 'templates/form_alta.php';
        ?>

        <table class="table table-striped">
            <thead class="table-success">
                <tr>
                    <th>NOMBRE</th>
                    <th>CIUDAD</th>
                    <th>PAÍS</th>
                    <th>LIGA</th>
                    <th>AÑO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team) { ?>
                    <tr>
                        <td><b><?php echo $team->nombre; ?></b></td>
                        <td><?php echo $team->ciudad; ?></td>
                        <td><?php echo $team->pais; ?></td>
                        <td><?php echo $team->liga; ?></td>
                        <td><?php echo $team->anio; ?></td>
                        <td>
                            <a href="eliminar/<?php echo $team->id_equipo; ?>" class="btn btn-danger btn-sm">Borrar</a>
                            <a href="editar/<?php echo $team->id_equipo; ?>" class="btn btn-outline-success">Editar</a>
                            <a href="jugadores/<?php echo $team->id_equipo; ?>" class="btn">Ver Equipo</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require 'templates/footer.php';
    }


    function showError($msg){
        echo "ERROR";
        echo  "<h2> $msg </h2>";
    }

    function showPlayers() {
    require 'templates/header_jugadores.php';

    // conexión a la base 
    try {
        $db = new PDO('mysql:host=localhost;dbname=tpe_2025;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        return;
    }

    // obtengo los registros de la tabla jugadores
    $query = $db->prepare("SELECT * FROM jugadores");
    $query->execute();
    $players = $query->fetchAll(PDO::FETCH_OBJ);

    require 'templates/form_alta.php';
    ?>

    <table class="table table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>POSICIÓN</th>
                <th>PUNTAJE</th>
                <th>ALTURA</th>
                <th>NÚMERO</th>
                <th>FECHA NACIMIENTO</th>
                <th>ID EQUIPO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($players as $player) { ?>
                <tr>
                    <td><?php echo $player->id_jugador; ?></td>
                    <td><b><?php echo $player->nombre; ?></b></td>
                    <td><?php echo $player->apellido; ?></td>
                    <td><?php echo $player->posicion; ?></td>
                    <td><?php echo $player->puntaje; ?></td>
                    <td><?php echo $player->altura; ?></td>
                    <td><?php echo $player->numero; ?></td>
                    <td><?php echo $player->fecha_nacimiento; ?></td>
                    <td><?php echo $player->id_equipo; ?></td>
                    <td>
                        <a href="eliminar/<?php echo $player->id_jugador; ?>" type="button" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    require 'templates/footer.php';
}
}
