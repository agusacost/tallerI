<main>
  <div class="container">
    <div class="bg-listar">
      <div class="table-title">
        <h1>Stock de productos</h1>
      </div>
      <?php if (session()->getFlashdata('msg')) : ?>
        <div class="success-form">*
          <?= session()->getFlashdata('msg') ?>
        </div>
      <?php endif; ?>
      <div class="table-button">
        <a href="<?= base_url('/producto') ?>" class="">Agregar un producto</a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Imagen</th>
            <th scope="col">Categoria</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Activo</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($product as $producto) : ?>
            <tr>
              <th scope="row"><?php echo $producto['id']; ?></th>
              <td><?php echo $producto['nombre']; ?></td>
              <td><?php echo $producto['descripcion']; ?></td>


              <td>
                <img src=" <?php echo base_url('assets/img/' . $producto['imagen']) ?>" alt="producto" width="100">

              </td>


              <td><?php echo $producto['id_categoria']; ?></td>
              <td><?php echo $producto['cantidad']; ?></td>
              <td>$ <?php echo  $producto['precio']; ?></td>
              <td> <?php echo  $producto['activo']; ?></td>
              <td>

                <div class="actions">
                  <div class="edit">
                    <!-- editar -->
                    <a href="<?= base_url('producto/' . $producto['id']); ?>" class=""><i class="fa-solid fa-pen-to-square"></i></a>
                  </div>
                  <?php if (isset($producto)) : ?>
                    <?php if ($producto['activo'] == 'NO') : ?>
                      <div class="edit">
                        <!-- editar -->
                        <a href="<?= base_url('activo/' . $producto['id']); ?>" class=""><i class="fa-solid fa-check"></i></a>
                      </div>
                    <?php else : ?>
                      <div class="delete">
                        <!-- borrar -->
                        <a href="<?= base_url('borrar/' . $producto['id']); ?>" class=""><i class="fa-solid fa-trash"></i></a>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>

              </td>
            </tr>
          <?php endforeach; ?>
      </table>
      <div class="pagination-links">
        <?= $pager->links('group1', 'my_pagination3') ?>
      </div>
    </div>
  </div>
</main>