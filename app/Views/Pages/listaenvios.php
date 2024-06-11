<main>
    <div class="container">
        <div class="bg-listar">
            <div class="table-title">
                <h1>Envios</h1>
            </div>
            <div class="table-button">
                <a href="<?= base_url('/ventas_list') ?>" class="">Ver ventas</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Venta Nº</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Codigo Postal</th>
                        <th scope="col">Metodo Envio</th>
                        <th scope="col">Costo </th>
                        <th scope="col">Fecha envio </th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($envios as $envio) : ?>
                        <tr>
                            <th scope="row"><?php echo $envio['id_envio']; ?></th>
                            <td><?php echo $envio['venta_id']; ?></td>
                            <td><?php echo $envio['direccion']; ?></td>
                            <td><?php echo $envio['ciudad']; ?></td>
                            <td><?php echo $envio['provincia']; ?></td>
                            <td><?php echo $envio['codigo_postal']; ?></td>
                            <td>
                                <?php if ($envio['metodo_envio'] == 1) : ?>
                                    Envio Estandar
                                <?php else : ?>
                                    Envio Express
                                <?php endif; ?>
                            </td>
                            <td><?php echo $envio['costo_envio']; ?></td>
                            <td><?php echo $envio['fecha_envio']; ?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>