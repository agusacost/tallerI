<div class="container">
    <div class="bg-listar">
        <div class="table-title">
            <h1>Mensajes Pendientes</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Consulta</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta) : ?>
                    <tr>
                        <th scope="row"><?php echo $consulta['id_consulta']; ?></th>
                        <td><?php echo $consulta['fullname']; ?></td>
                        <td><?php echo $consulta['email']; ?></td>
                        <td><?php echo $consulta['message']; ?></td>
                        <td>
                            <div class="actions">
                                <div class="delete">
                                    <!-- borrar -->
                                    <a href="<?= base_url('borrar_consulta/' . $consulta['id_consulta']); ?>" class=""><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
</div>