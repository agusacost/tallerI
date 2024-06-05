<div class="container">
    <div class="bg-listar">
        <div class="table-title">
            <h1>Nuestros productos!</h1>
        </div>
        <!--Filtros: TODO Centrar -->
        <div class="productoFiltro">
            <form action="<?= base_url('productos/filtrar') ?>" method="post">
                <select name="id_categoria">
                    <option value="">Todos</option>
                    <option value="3" <?php if (isset($_POST['id_categoria']) && $_POST['id_categoria'] == '3') echo 'selected'; ?>>Cereales</option>
                    <option value="1" <?php if (isset($_POST['id_categoria']) && $_POST['id_categoria'] == '1') echo 'selected'; ?>>Frutos secos</option>
                    <option value="2" <?php if (isset($_POST['id_categoria']) && $_POST['id_categoria'] == '2') echo 'selected'; ?>>Suplementos</option>
                </select>
                <button type="submit" class="btn-filtrar">Filtrar</button>
            </form>
        </div>
        <div class="productContainer">
            <?php foreach ($product as $producto) : ?>
                <div class="productCard">
                    <div class="producto-card">
                        <img src="<?= base_url('assets/img/' . $producto['imagen']);  ?>" alt="producto">
                        <h3><?php echo $producto['nombre']; ?></h3>
                        <p><?php echo $producto['descripcion']; ?></p>
                        <div class="compra">
                            <span class="precio">$ <?php echo  $producto['precio']; ?> </span>
                            <div class="pago">
                                <p><i class="fa-regular fa-credit-card"></i>Pagalo como quieras!</p>
                            </div>
                            <button class="btn-agregar">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>