<main>
    <div class="container">
        <div class="bg-listar">
            <div class="table-title">
                <h1>Ventas Realizadas</h1>
            </div>
            <div class="table-button">
                <a href="<?= base_url('/envios_list') ?>" class="">Ver envios</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Fecha venta</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tipo Pago</th>
                        <th scope="col">Tarjeta</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta) : ?>
                        <tr>
                            <th scope="row"><?php echo $venta['id_venta']; ?></th>
                            <td><?php echo $venta['fecha']; ?></td>
                            <td><?php echo $venta['userEmail']; ?></td>
                            <td><?php echo $venta['total_venta']; ?></td>
                            <td><?php echo $venta['tipoPago_descripcion']; ?></td>
                            <td><?php echo $venta['tarjeta']; ?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>