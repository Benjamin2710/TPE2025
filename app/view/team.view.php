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
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require 'templates/footer.php';
    }

    //EDITAR
    function editTeam($team) {
    include 'templates/header.php';
    ?>
    <div class="container mt-4">
        <h2 class="mb-3">Editar Equipo</h2>
        <form method="post" class="p-3 border rounded shadow-sm bg-light">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Nombre</label>
                    <input type="text" name="Nombre" class="form-control" value="<?= $team->nombre ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Ciudad</label>
                    <input type="text" name="Ciudad" class="form-control" value="<?= $team->ciudad ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">País</label>
                    <input type="text" name="Pais" class="form-control" value="<?= $team->pais ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Liga</label>
                    <input type="text" name="Liga" class="form-control" value="<?= $team->liga ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Año</label>
                    <input type="text" name="Año" class="form-control" value="<?= $team->anio ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3">Actualizar</button>
            <a href="<?= BASE_URL ?>" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
    <?php
    include 'templates/footer.php';
}



    function showError($msg){
        echo "ERROR";
        echo  "<h2> $msg </h2>";
    }

}
