<?= $header ?>
<!-- banner -->
<section class="banner">
  <?php $session = session(); ?>
  <div class="content-banner">
    <p>Mantenete natural</p>
    <h2>Productos 100% organicos<br>Libre de conservantes</h2>
    <a href="#">Comprar ahora</a>
  </div>
</section>
<!-- endbanner -->
<main class="main-content">
  <!-- categories -->
  <section class="container">
    <div class="categorias-texto">
      <h1 class="text-center">Categorías</h1>
    </div>
    <div class="top-categories">
      <div class="card-category category-cereales">
        <p>Cereales</p>
        <span>Ver mas</span>
      </div>
      <div class="card-category category-frutos-secos">
        <p>Frutos Secos</p>
        <span>Ver mas</span>
      </div>
      <div class="card-category category-suplementos">
        <p>Suplementos</p>
        <span>Ver mas</span>
      </div>
    </div>
  </section>

  <!-- cards -->
  <section class="container container-features">
    <div class="card-feature">
      <i class="fa-solid fa-truck"></i>
      <div class="feature-content">
        <span>Delivery</span>
        <p>A donde desees!</p>
      </div>
    </div>
    <div class="card-feature">
      <i class="fa-solid fa-credit-card"></i>
      <div class="feature-content">
        <span>Pagos</span>
        <p>Todas las tarjetas</p>
      </div>
    </div>
    <div class="card-feature">
      <i class="fa-solid fa-gift"></i>
      <div class="feature-content">
        <span>Regalos</span>
        <p>Elegí el monto</p>
      </div>
    </div>
    <div class="card-feature">
      <i class="fa-solid fa-headset"></i>
      <div class="feature-content">
        <span>Llamanos</span>
        <p>123-456-7890</p>
      </div>
    </div>
  </section>
  <!-- end cards -->
  <!-- cards -->
  <section>
    <h2 class="text-center">Nuestros seleccionados!</h2>
    <div class="principal-cards">
      <div class="productCard">
        <div class="producto-card">
          <img src="<?= base_url('assets/img/1716416400_85336797a6fbf8a0d67c.jpg');  ?>" alt="producto">
          <h3>Almohaditas</h3>
          <p>100gr</p>
          <div class="compra">
            <span class="precio">$600</span>
            <div class="pago">
              <p><i class="fa-regular fa-credit-card"></i>Pagalo como quieras!</p>
            </div>
            <a href="<?= base_url('/login') ?>" class="btn-comprar">Comprar</a>
          </div>
        </div>
      </div>
      <!-- prod 2 -->
      <div class="productCard">
        <div class="producto-card">
          <img src="<?= base_url('assets/img/1717623929_9bc37d28596a5b7887d6.png');  ?>" alt="producto">
          <h3>Mullti-Collagen</h3>
          <p>30 tabletas</p>
          <div class="compra">
            <span class="precio">$ 15547.06</span>
            <div class="pago">
              <p><i class="fa-regular fa-credit-card"></i>Pagalo como quieras!</p>
            </div>
            <a href="<?= base_url('/login') ?>" class="btn-comprar">Comprar</a>
          </div>
        </div>
      </div>
      <!-- prod 3 -->
      <div class="productCard">
        <div class="producto-card">
          <img src="<?= base_url('assets/img/1717624166_b5bc2cc1be3c2a19543b.png');  ?>" alt="producto">
          <h3>Natural Life Move</h3>
          <p>30 tabletas</p>
          <div class="compra">
            <span class="precio">$15219.00</span>
            <div class="pago">
              <p><i class="fa-regular fa-credit-card"></i>Pagalo como quieras!</p>
            </div>
            <?php if ($session->get('isLoggedIn')) : ?>
              <a href="<?= base_url('/productos') ?>" class="btn-comprar">Comprar</a>
            <?php else : ?>
              <a href="<?= base_url('/login') ?>" class="btn-comprar">Comprar</a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?= $footer ?>