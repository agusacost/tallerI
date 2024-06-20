 <main>
     <div class="container">
         <div class="bg-listar">
             <div class="table-title">
                 <h1>Usuarios Registrados</h1>
             </div>
             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">id</th>
                         <th scope="col">Nombre</th>
                         <th scope="col">Apellido</th>
                         <th scope="col">Email</th>
                         <th scope="col">Tipo</th>
                         <th scope="col">Baja</th>
                         <th scope="col">Acciones</th>

                     </tr>
                 </thead>
                 <?php
                    $session = session();
                    $currentUserId = $session->get('id');
                    ?>
                 <tbody>
                     <?php foreach ($users as $user) : ?>
                         <?php if ($user['id'] != $currentUserId) : ?>
                             <tr>
                                 <td><?php echo $user['id']; ?></td>
                                 <td><?php echo $user['name']; ?></td>
                                 <td><?php echo $user['surname']; ?></td>
                                 <td><?php echo $user['email']; ?></td>
                                 <td><?php if ($user['id_perfil'] == 1) {
                                            echo 'Admin';
                                        } else {
                                            echo 'User';
                                        } ?></td>
                                 <td><?php echo $user['baja']; ?></td>
                                 <td>
                                     <div class="actions">
                                         <div class="edit">
                                             <!-- editar -->
                                             <a href="<?= base_url('edit/' . $user['id']); ?>" class=""><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                                         </div>
                                     </div>

                                 </td>
                             </tr>
                         <?php endif; ?>
                     <?php endforeach; ?>
             </table>
             <div class="pagination-links">
                 <?= $pager->links('group1', 'user_pagination') ?>
             </div>
         </div>
     </div>
 </main>