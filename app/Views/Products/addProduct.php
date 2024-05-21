<div class="container mt-5">
    <h1 class="mb-4">Agregar Producto</h1>
    <form action="<?= site_url('/save') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group mb-2">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2" required></textarea>
        </div>
        <div class="form-group mb-2">
            <label for="img">Imagen</label>
            <input type="file" class="form-control-file mx-2" id="img" name="img" accept="image/*" required>
        </div>
        <div class="form-group mb-2">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required>
        </div>
        <div class="form-group mb-2">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>