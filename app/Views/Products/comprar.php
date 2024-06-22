<main>
    <div class="container">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="compra-container">
            <div class="compra-title">
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

            <form class="compra-form" action="<?= base_url('ventas/comprar') ?>" method="post">
                <?php if (session()->has('validation')) : ?>
                    <div class="alerta-error">
                        <?= session('validation')->listErrors() ?>
                    </div>
                <?php endif; ?>
                <h3>Información de Envío y Pago</h3>
                <?= csrf_field() ?>
                <div>
                    <label for="tipoPago">Tipo de Pago:</label>
                    <select name="tipoPago_id" id="tipoPago" required>
                        <option value="1">Tarjeta de Crédito</option>
                        <option value="2">Tarjeta de Débito</option>
                    </select>
                </div>
                <div>
                    <label for="tarjeta">Número de Tarjeta:
                        <input type="text" name="tarjeta" id="tarjeta" maxlength="16" required>
                        <?php if ($validation->getError('tarjeta')) { ?>
                            <div class='error-form'>*
                                <?= $error = $validation->getError('tarjeta'); ?>
                            </div>
                        <?php } ?>
                    </label>
                </div>
                <div class="tarjeta-data">
                    <div>
                        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                        <input type="month" name="fecha_vencimiento" id="fecha_vencimiento" required>
                    </div>
                    <div>
                        <label for="cvv">CVV</label>
                        <input type="text" name="cvv" id="cvv" maxlength="3" required>
                    </div>
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
                <div id="costo_envio_container">
                    <label for="costo_envio">Costo de Envío:</label>
                    <input type="hidden" name="costo_envio" id="costo_envio_hidden" value="">
                    <span id="costo_envio">...</span>
                </div>
                <div id="costo_total_container">
                    <label for="costo_total">Costo total:</label>
                    <input type="hidden" name="costo_total" id="costo_total_hidden" value="">
                    <span id="costo_total">...</span>
                </div>
                <button type="submit">Realizar Compra</button>
            </form>
        </div>
    </div>
</main>

<script>
    function calcularCostoTotal() {
        var metodoEnvio = document.getElementById('metodo_envio').value;
        var costoEnvio = 0;

        // Asigna el costo de envío según el método seleccionado
        if (metodoEnvio === '1') {
            costoEnvio = 1750; // Costo para Envío Estándar
        } else if (metodoEnvio === '2') {
            costoEnvio = 3850; // Costo para Envío Exprés
        }

        // Muestra el costo de envío
        document.getElementById('costo_envio').textContent = '$' + costoEnvio.toFixed(2);
        document.getElementById('costo_envio_hidden').value = costoEnvio.toFixed(2);

        // Calcula el total de los productos del carrito
        var totalProductos = <?= array_reduce($productos, function ($carry, $producto) {
                                    return $carry + $producto['price'] * $producto['qty'];
                                }, 0) ?>;

        // Calcula el costo total
        var costoTotal = totalProductos + costoEnvio;

        // Muestra el costo total
        document.getElementById('costo_total').textContent = '$' + costoTotal.toFixed(2);
        document.getElementById('costo_total_hidden').value = costoTotal.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var month = (today.getMonth() + 1).toString().padStart(2, '0'); // meses empiezan en 0
        var year = today.getFullYear();
        var minDate = year + '-' + month;

        document.getElementById('fecha_vencimiento').setAttribute('min', minDate);
    });

    document.getElementById('metodo_envio').addEventListener('change', calcularCostoTotal);

    // Calcula al cargar la página
    window.addEventListener('DOMContentLoaded', calcularCostoTotal);

    document.getElementById('tarjeta').addEventListener('input', function(event) {
        var input = event.target;
        if (input.value.length > 16) {
            input.value = input.value.slice(0, 16);
        }
    });

    document.getElementById('cvv').addEventListener('input', function(event) {
        var input = event.target;
        if (input.value.length > 3) {
            input.value = input.value.slice(0, 3);
        }
    });
</script>