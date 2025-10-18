<?php
class JugadorView {

    function showJugadores($jugadores, $clubs = []) {
        include 'templates/header.php';
        ?>
        <div class="container mt-4">
            <h2 class="mb-3">Jugadores</h2>
            <a href="<?php echo BASE_URL ?>agregar_jugador" class="btn btn-success mb-3">Agregar Jugador</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>País</th>
                        <th>Posición</th>
                        <th>Puntaje</th>
                        <th>Altura</th>
                        <th>Número</th>
                        <th>Equipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jugadores as $jugador): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($jugador->nombre); ?></td>
                            <td><?php echo htmlspecialchars($jugador->apellido); ?></td>
                            <td><?php echo htmlspecialchars($jugador->pais); ?></td>
                            <td><?php echo htmlspecialchars($jugador->posicion); ?></td>
                            <td><?php echo htmlspecialchars($jugador->puntaje); ?></td>
                            <td><?php echo htmlspecialchars($jugador->altura); ?></td>
                            <td><?php echo htmlspecialchars($jugador->numero); ?></td>
                            <td><?php echo htmlspecialchars($jugador->nombre_equipo); ?></td>
                            <td>
                                <a href="<?php echo BASE_URL ?>editar_jugador/<?php echo $jugador->id_jugador; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="<?php echo BASE_URL ?>borrar_jugador/<?php echo $jugador->id_jugador; ?>" class="btn btn-danger btn-sm">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
        include 'templates/footer.php';
    }

    function showError($msg) {
        include 'templates/header.php';
        echo "<div class='alert alert-danger mt-4'>$msg</div>";
        include 'templates/footer.php';
    }

    function showEdit($jugador, $clubs = []) {
        include 'templates/header.php';
        ?>
        <div class="container mt-4">
            <h2 class="mb-3">Editar Jugador</h2>
            <form method="post" class="p-3 border rounded shadow-sm bg-light">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($jugador->nombre); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="<?php echo htmlspecialchars($jugador->apellido); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control" value="<?php echo htmlspecialchars($jugador->pais); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Posición</label>
                    <input type="text" name="posicion" class="form-control" value="<?php echo htmlspecialchars($jugador->posicion); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Puntaje</label>
                    <input type="number" name="puntaje" class="form-control" value="<?php echo htmlspecialchars($jugador->puntaje); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Altura</label>
                    <input type="text" name="altura" class="form-control" value="<?php echo htmlspecialchars($jugador->altura); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Número</label>
                    <input type="number" name="numero" class="form-control" value="<?php echo htmlspecialchars($jugador->numero); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Equipo</label>
                    <select name="id_equipo" class="form-select">
                        <?php foreach($clubs as $club): ?>
                            <option value="<?php echo $club->id_equipo; ?>" <?php if($jugador->id_equipo == $club->id_equipo) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($club->nombre); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <?php
        include 'templates/footer.php';
    }
}
