<h2 class="mb-3">Editar Equipo</h2>
<form method="post" class="p-3 border rounded shadow-sm bg-light">
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-semibold">Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="<?php echo $task->nombre ?>" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Ciudad</label>
            <input type="text" name="Ciudad" class="form-control" value="<?php echo $task->ciudad ?>" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">País</label>
            <input type="text" name="Pais" class="form-control" value="<?php echo $task->pais ?>" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Liga</label>
            <input type="text" name="Liga" class="form-control" value="<?php echo $task->liga ?>" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Año</label>
            <input type="text" name="Año" class="form-control" value="<?php echo $task->anio ?>" required>
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Actualizar</button>
</form>
