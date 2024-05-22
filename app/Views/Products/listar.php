<div class="container">
  <div class="table-title">
    <h1>Stock de productos</h1>
  </div>
  <div class="table-button">
    <a href="<?= base_url('/addProduct') ?>" class="">Agregar un producto</a>
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
            <img src="assets\img\<?php echo $producto['imagen']; ?>" alt="producto" width="100">
          </td>


          <td><?php echo $producto['id_categoria']; ?></td>
          <td><?php echo $producto['cantidad']; ?></td>
          <td>$ <?php echo  $producto['precio']; ?></td>
          <td>

            <div class="actions">
              <div class="edit">
                <!-- editar -->
                <a href="#" class=""><i class="fa-solid fa-pen-to-square"></i></a>
              </div>
              <div class="delete">
                <!-- borrar -->
                <a href="<?= base_url('borrar/' . $producto['id']); ?>" class=""><i class="fa-solid fa-trash"></i></a>
              </div>
            </div>

          </td>
        </tr>
      <?php endforeach; ?>
  </table>
</div>