<div class="container">
    <h1>Agregar Producto</h1>
    <?php if (!empty($error)) : ?>
        <div class="error-form">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <form action="<?= site_url('/save') ?>" method="post" enctype="multipart/form-data">
        <div class="">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2" required></textarea>
        </div>
        <div class="">
            <label for="imagen">Seleccionar Imagen</label>
            <input type="file" class="form-control-file mx-2" id="imagen" name="imagen" accept="image/*" required>
        </div>
        <div class="">
            <label for="precio">Categoria</label>
            <select name="id_categoria" id="id_categoria" required>
                <option value="1">Frutos Secos</option>
                <option value="2">Suplementos</option>
                <option value="3">Cereales</option>
            </select>
        </div>
        <div class="">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required>
        </div>
        <div class="">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" required>
        </div>
        <button type="submit" class="">Guardar</button>
    </form>
</div>