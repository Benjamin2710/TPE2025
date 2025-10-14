<!-- formulario de alta de registro -->
<form action="agregar" method="POST" class="my-4 p-3 border rounded shadow-sm bg-light">
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-semibold">Nombre</label>
            <input required name="Nombre" type="text" class="form-control" placeholder="Ingrese el nombre">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Ciudad</label>
            <input required name="Ciudad" type="text" class="form-control" placeholder="Ingrese la ciudad">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">País</label>
            <input required name="Pais" type="text" class="form-control" placeholder="Ingrese el país">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Liga</label>
            <input required name="Liga" type="text" class="form-control" placeholder="Ingrese la liga">
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Año</label>
            <input required name="Año" type="text" class="form-control" placeholder="Ingrese el año">
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Agregar</button>
</form>
