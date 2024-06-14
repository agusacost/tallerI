<main>
    <div class="container">
        <?php $session = session(); ?>
        <div class="bg-listar">
            <div class="table-title">
                <?php if ($session->get('id_perfil') == 1) : ?>
                    <h1>Ventas Realizadas</h1>
                <?php else : ?>
                    <h1>Tus Compras</h1>
                <?php endif; ?>
            </div>
            <?php if ($session->get('id_perfil') == 1) : ?>
                <div class="table-button">
                    <a href="<?= base_url('/envios_list') ?>" class="">Ver envios</a>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Fecha venta</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tipo Pago</th>
                        <th scope="col">Tarjeta</th>
                        <th scope="col">Comprobante</th>
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
                            <td>
                                <div class="comprobante-col">
                                    <a href="<?= base_url('/ventas/comprobante/' . $venta['id_venta']) ?>"><i class="fa-regular fa-file"></i>Comprobante</a>
                                </div>
                            </td>
        </div>
        </tr>
    <?php endforeach; ?>
    </table>
    <div class="pagination-links">
        <?= $pager->links('group1', 'my_pagination2') ?>
    </div>
    </div>
    </div>
</main>