<div class="container">
    <h1><?= isset($product) ? 'Editar producto' : 'Agregar Producto'; ?></h1>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="error-form">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('mensaje')) : ?>
        <div class="succes-form">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>


    <form action="<?= isset($product) ? site_url('/producto/save/' . $product['id']) : site_url('/producto/save') ?>" method="post" enctype="multipart/form-data">
        <!-- nombre -->
        <div class="">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= isset($product) ? $product['nombre'] : '' ?>" required>
        </div>
        <!-- descripcion -->
        <div class="">
            <label for="descripcion">Descripción:</label>
            <input class="form-control" id="descripcion" name="descripcion" rows="2" value="<?= isset($product) ? $product['descripcion'] : '' ?>" required>
        </div>
        <!-- cargar imagen -->
        <div class="">
            <label for="imagen">Seleccionar Imagen</label>
            <input type="file" id="imagen" name="imagen"><br><br>

        </div>
        <!-- categoria -->
        <div class="">
            <label for="id_categoria">Categoria</label>
            <select name="id_categoria" id="id_categoria" required>
                <option value="1" <?= isset($product) && $product['id_categoria'] == 1 ? 'selected' : '' ?>>Frutos Secos</option>
                <option value="2" <?= isset($product) && $product['id_categoria'] == 2 ? 'selected' : '' ?>>Suplementos</option>
                <option value="3" <?= isset($product) && $product['id_categoria'] == 3 ? 'selected' : '' ?>>Cereales</option>
            </select>
        </div>
        <!-- precio -->
        <div class="">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" value="<?= isset($product) ? $product['precio'] : '' ?>" required>
        </div>
        <!-- cantidad -->
        <div class="">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" value="<?= isset($product) ? $product['cantidad'] : '' ?>" required>
        </div>
        <button type="submit" class=""><?= isset($product) ? 'Actualizar Producto' : 'Crear Producto' ?></button>
    </form>
</div>