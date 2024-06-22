<main>
    <div class="container">
        <div class="carrito-container">
            <div>
                <div class="heading">
                    <h2>Carrito de compras</h2>
                </div>
                <div class="carritoInfo">
                    <?php
                    if (empty($cart)) {
                        echo 'Para agregar productos haga click en '; ?>
                        <a href="<?php echo base_url('/productos') ?>">Ir al catálogo</a>
                    <?php } ?>
                </div>
            </div>
            <?php if (session()->getFlashdata('mensaje')) : ?>
                <div>
                    <h4><?= session()->getFlashdata('mensaje') ?></h4>
                </div>
            <?php endif; ?>
            <table class="carrito-tabla">
                <thead>
                    <tr>

                        <th class="producto-nombre">Producto</th>
                        <th class="producto-precio">Precio</th>
                        <th class="producto-cantidad">Cantidad</th>
                        <th class="producto-accion">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($productos)) : ?>
                        <?php foreach ($productos as $producto) : ?>
                            <tr>
                                <td class="producto-nombre"><?= $producto['nombre'] ?></td>
                                <td class="producto-precio">$<?= number_format($producto['precio'], 2) ?></td>
                                <td class="producto-cantidad">
                                    <form action="<?= base_url('carrito/update') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="rowid" value="<?= $producto['rowid'] ?>">
                                        <input type="number" name="qty" value="<?= $producto['qty'] ?>" min="1">
                                        <button type="submit" class="btn-actualizar">Actualizar</button>
                                    </form>
                                </td>
                                <td class="producto-accion">
                                    <form action="<?= base_url('carrito/remove/' . $producto['rowid']) ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">No hay productos en el carrito</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if (!empty($productos)) : ?>
                <div class="carrito-total">
                    <p>Total: $ <span id="carrito-total"><?= number_format($cart->total(), 2) ?></span></p>
                    <form action="<?= base_url('ventas/confirmar') ?>" method="get">
                        <button class="btn-comprar">Proceder a comprar</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>