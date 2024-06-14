<main>
    <div class="container">
        <?php $session = session(); ?>
        <div class="bg-listar">
            <div class="table-title">
                <h1>Nuestros productos!</h1>
            </div>
            <?php if (session()->getFlashdata('mensaje')) : ?>
                <div class="mensaje-agregado">
                    <p>
                        <?= session()->getFlashdata('mensaje') ?>
                    </p>
                </div>
            <?php endif; ?>
            <!--Filtros: TODO Centrar -->
            <div class="productoFiltro">
                <form action="<?= base_url('productos/filtrar/1') ?>" method="post">
                    <select name="id_categoria">
                        <option value="">Todos</option>
                        <option value="3" <?php if (isset($_POST['id_categoria']) && $_POST['id_categoria'] == '3') echo 'selected'; ?>>Cereales</option>
                        <option value="1" <?php if (isset($_POST['id_categoria']) && $_POST['id_categoria'] == '1') echo 'selected'; ?>>Frutos secos</option>
                        <option value="2" <?php if (isset($_POST['id_categoria']) && $_POST['id_categoria'] == '2') echo 'selected'; ?>>Suplementos</option>
                    </select>
                    <button type="submit" class="btn-filtrar">Filtrar</button>
                </form>
            </div>
            <div class="pagination-links">
                <?= $pager->links('group1', 'my_pagination') ?>
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
                                <form action="<?= base_url('carrito/add') ?>" method="post">
                                    <!-- Datos del producto -->
                                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                    <input type="hidden" name="qty" value="1"> <!-- Cantidad predeterminada -->
                                    <input type="hidden" name="price" value="<?= $producto['precio'] ?>">
                                    <input type="hidden" name="name" value="<?= $producto['nombre'] ?>">
                                    <!-- Botón de agregar al carrito -->
                                    <?php if ($session->get('isLoggedIn')) : ?>
                                        <button type="submit" class="btn-agregar">Agregar al carrito</button>
                                    <?php else : ?>
                                        <a href="<?= base_url('/login') ?>" class="btn-comprar">Comprar</a>
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pagination-links">
            <?= $pager->links('group1', 'my_pagination') ?>
        </div>
    </div>
</main>