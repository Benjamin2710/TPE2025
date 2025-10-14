<?php
require_once './app/db.php';

function showTeams() {
    require 'templates/header.php';

    // obtengo los registros
    $team = getTeams();

    require 'templates/form_alta.php';
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
            <?php foreach($team as $team) { ?>
                <tr>
                    <td><b><?php echo $team->nombre; ?></b></td>
                    <td><?php echo  $team->ciudad; ?></td>
                    <td><?php echo $team->pais; ?></td>
                    <td><?php echo $team->liga; ?></td>
                    <td><?php echo $team->anio; ?></td>
                    <td>
                        <a href="eliminar/<?php echo $team->id_equipo; ?>" type="button" class="btn btn-danger btn-sm">Borrar</a>
                        <a href="editar/<?php echo $team->id_equipo; ?>" type="button" class="btn btn-outline-success">Editar</a>
                        <a href="jugadores/<?php echo $team->id_equipo; ?>" type="button" class="btn">Ver Equipo</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    require 'templates/footer.php';
}

function addTeam() {
    // obtengo los datos del formulario
    $nombre = $_POST['Nombre'];
    $ciudad = $_POST['Ciudad'];
    $pais = $_POST['Pais'];
    $liga = $_POST['Liga'];
    $anio = $_POST['Año'];

    // inserto en la DB
    $id = insertTeam($nombre, $ciudad, $pais, $liga, $anio);

    if ($id) {
        header('Location: ' . BASE_URL);
    } else {
        echo "Error al insertar el registro";
    }
}

function removeTeam($id) {
    deleteTeam($id);
    header('Location: ' . BASE_URL);
}

function editTeam($id) {
    require 'templates/header.php'; 

    $db = getConnection();
    $query = $db->prepare('SELECT * FROM equipos WHERE id_equipo = ?');
    $query->execute([$id]);
    $task = $query->fetch(PDO::FETCH_OBJ);

    // si se envió el formulario, actualizamos
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['Nombre'];
        $ciudad = $_POST['Ciudad'];
        $pais = $_POST['Pais'];
        $liga = $_POST['Liga'];
        $anio = $_POST['Año'];
        updateTeam($id, $nombre, $ciudad, $pais, $liga, $anio);
        header('Location: ' . BASE_URL);
        exit;
    }

    // incluimos el formulario de edición
    require 'templates/form_edit.php';

    require 'templates/footer.php'; 
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
?>


