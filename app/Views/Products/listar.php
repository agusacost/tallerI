<?= $header ?>
<div class="container">
  <h1>Stock de productos</h1>
  <div class="btn btn-primary m-4">
  <a href="<?= base_url('/addProduct') ?>" class="text-white text-decoration-none">Agregar un producto</a>
  </div>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio unitario</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Valor stock</th>
        <th scope="col">Funcion</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($product as $producto) : ?>
        <tr>
          <th scope="row"><?php echo $producto['id']; ?></th>
          <td><?php echo $producto['nombre']; ?></td>
          <td><?php echo $producto['descripcion']; ?></td>


          <td>
            <img src="app\assets\img\<?php echo $producto['img']; ?>" alt="producto" width="100">
          </td>


          <td>$<?php echo $producto['precio']; ?></td>
          <td><?php echo $producto['cantidad']; ?></td>
          <td><?php $precioTotal = $producto['precio'] * $producto['cantidad'];
              echo "$", $precioTotal ?></td>
          <td>
            <div class="container">
              <div class="row justify-content-center ">
                <div class="col-auto">
                  <a href="<?= base_url('borrar/' . $producto['id']); ?>" class="btn btn-danger">Borrar</a>
                </div>
                <div class="col-auto">
                  <a href="#" class=" btn btn-warning">Editar</a>
                </div>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
  </table>
</div>


<?= $footer ?>