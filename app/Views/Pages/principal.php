<?= $header ?>
<!-- banner -->
<section class="banner">
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

  <!-- Ofertas -->

  <section class="container">
    <div class="descuentos-texto">
    <h1 class="text-center">Productos en descuento</h1>
    </div>
    <div class="container-descuentos">
      <!-- prod 1 -->
    <div class="container-products">
      <div class="card-product">
        <div class="container-img">
          <img src="assets\img\mix-secos.jpg" alt="Mix frutos secos" />
          <span class="discount">-10%</span>
          <div class="button-group">
            <span>
              <i class="fa-regular fa-eye"></i>
            </span>
            <span>
              <i class="fa-regular fa-heart"></i>
            </span>
            <span>
              <i class="fa-solid fa-code-compare"></i>
            </span>
          </div>
        </div>
        <div class="content-card-product">
          <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h3>Mix frutos secos <br>100gr</h3>
          <span class="add-cart">
            <i class="fa-solid fa-basket-shopping"></i>
          </span>
          <p class="price">$2700 <span>$3000</span></p>
        </div>
      </div>
    </div>
    <!-- prod 2 -->
    <div class="container-products">
      <div class="card-product">
        <div class="container-img">
          <img src="assets/img/mix-rojos.jpg" alt="Mix rojos" />
          <span class="discount">-13%</span>
          <div class="button-group">
            <span>
              <i class="fa-regular fa-eye"></i>
            </span>
            <span>
              <i class="fa-regular fa-heart"></i>
            </span>
            <span>
              <i class="fa-solid fa-code-compare"></i>
            </span>
          </div>
        </div>
        <div class="content-card-product">
          <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <h3>Mix frutos rojos <br>1Kg</h3>
          <span class="add-cart">
            <i class="fa-solid fa-basket-shopping"></i>
          </span>
          <p class="price">$13050 <span>$15000</span></p>
        </div>
      </div>
    </div>
    <!-- prod 3 -->
    <div class="container-products">
      <div class="card-product">
        <div class="container-img">
          <img src="assets/img/omega3.jpeg" alt="Cafe Irish" />
          <span class="discount">-15%</span>
          <div class="button-group">
            <span>
              <i class="fa-regular fa-eye"></i>
            </span>
            <span>
              <i class="fa-regular fa-heart"></i>
            </span>
            <span>
              <i class="fa-solid fa-code-compare"></i>
            </span>
          </div>
        </div>
        <div class="content-card-product">
          <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h3>Spring Valley Omega-3 <br>2000mg,180 capsulas</h3>
          <span class="add-cart">
            <i class="fa-solid fa-basket-shopping"></i>
          </span>
          <p class="price">$42500 <span>$50000</span></p>
        </div>
      </div>
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
</main>

<?= $footer ?>