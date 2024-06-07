<main class="container">
    <div class="compra-container">
        <div class="heading">
            <h2>Confirmar Compra</h2>
        </div>
        <h3>Detalles del Carrito</h3>
        <table class="carrito-tabla">
            <thead>
                <tr>
                    <th class="producto-nombre">Producto</th>
                    <th class="producto-precio">Precio</th>
                    <th class="producto-cantidad">Cantidad</th>
                    <th class="producto-subtotal">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td class="producto-nombre"><?= $producto['name'] ?></td>
                        <td class="producto-precio">$<?= number_format($producto['price'], 2) ?></td>
                        <td class="producto-cantidad"><?= $producto['qty'] ?></td>
                        <td class="producto-subtotal">$<?= number_format($producto['price'] * $producto['qty'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Información de Envío y Pago</h3>
        <form action="<?= base_url('ventas/comprar') ?>" method="post">
            <?= csrf_field() ?>
            <div>
                <label for="tipoPago">Tipo de Pago:</label>
                <select name="tipoPago_id" id="tipoPago" required>
                    <option value="1">Tarjeta de Crédito</option>
                    <option value="2">Tarjeta de Débito</option>
                </select>
            </div>
            <div>
                <label for="tarjeta">Número de Tarjeta:</label>
                <input type="text" name="tarjeta" id="tarjeta" required>
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" required>
            </div>
            <div>
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" required>
            </div>
            <div>
                <label for="provincia">Provincia:</label>
                <input type="text" name="provincia" id="provincia" required>
            </div>
            <div>
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" name="codigo_postal" id="codigo_postal" required>
            </div>
            <div>
                <label for="metodo_envio">Método de Envío:</label>
                <select name="metodo_envio" id="metodo_envio" required>
                    <option value="1">Envío Estándar</option>
                    <option value="2">Envío Exprés</option>
                </select>
            </div>
            <div>
                <label for="costo_envio">Costo de Envío:</label>
            </div>
            <button type="submit" class="btn-comprar">Realizar Compra</button>
        </form>
    </div>
</main>