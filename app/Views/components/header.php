<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- fuente -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <!-- globales -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/header.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/footer-fixs.css') ?>">
  <!-- principal -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/principal-banner-fix.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/principal-categories.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/principal-products-fix.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/principal-productos-2.css') ?>">

  <!-- contact -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/contact.css') ?>">
  <!-- about -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/about.css') ?>">
  <!-- preg frecuentes -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/preg-frec-fix.css') ?>">
  <!-- terminos -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/terms.css') ?>">
  <!-- login -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/login.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/register.css') ?>">
  <!-- productos -->
  <link rel="stylesheet" href="<?= base_url('/assets/css/products/allproducts.css') ?>">


  <title>KeepGreen</title>

</head>

<body>
  <?php $session = session();
  $totalItems = session()->get('totalItems') ?? 0;
  ?>
  <header>
    <!-- Nav -->
    <nav class="header-nav">
      <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url('assets/img/logo.jpeg') ?>" alt=" logo" width="200">
      </a>
      <?php if ($session->get('isLoggedIn')) : ?>
        <ul id="menuList" class="menu-list">
          <!-- Si es admin -->
          <?php if ($session->get('id_perfil') == 1) : ?>
            <li class="menu-list-li"><a class="menu-list-a" href="<?= base_url('/contact_list') ?>">Consultas</a></li>
            <li class="menu-list-li"><a class="menu-list-a" href="<?= base_url('/ventas_list/pagina/1') ?>">Ventas</a></li>
            <li class="menu-list-li"><a class="menu-list-a" href="<?= base_url('/listar/pagina/1') ?>">Productos</a></li>
            <li class="menu-list-li"><a class="menu-list-a" href="<?= base_url('/listar_users/pagina/1') ?>">Perfiles</a></li>
          <?php else : ?>
            <!-- Usuario user -->
            <li class="menu-list-li"><a href="<?= base_url('/productos/pagina/1') ?>">Productos</a></li>
            <li class="menu-list-li"><a href="<?= base_url('/profile') ?>">Perfil</a></li>
            <div class="nav-carrito">
              <a href="<?= base_url('/carrito/view') ?>">
                <i class="fa-solid fa-cart-shopping"></i><span class="badge"><?= $totalItems ?></span>
              </a>
            </div>
          <?php endif; ?>
          <div class="nav-carrito">
            <li><a href="<?= base_url('/logout') ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
          </div>
        </ul>
      <?php else : ?>
        <ul id="menuList" class="menu-list">
          <li class="menu-list-li"><a href="<?= base_url() ?>">Home</a></li>
          <li class="menu-list-li"><a href="<?= base_url('/productos/pagina/1') ?>">Productos</a></li>
          <li class="menu-list-li"><a href="<?= base_url('/about') ?>">Quiénes somos</a></li>
          <li class="menu-list-li"><a href="<?= base_url('/contact') ?>">Contacto</a></li>
          <li class="menu-list-li"><a href="<?= base_url('/login') ?>">Login</a></li>
        </ul>
      <?php endif ?>
      <!-- Usuarios logueados -->
      <div class="menu-icon">
        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
      </div>
    </nav>
  </header>
  <script>
    let menuList = document.getElementById("menuList")
    menuList.style.maxHeight = "0px";

    function toggleMenu() {
      if (menuList.style.maxHeight == "0px") {
        menuList.style.maxHeight = "300px"
      } else {
        menuList.style.maxHeight = "0px"
      }
    }
  </script>
  <script src="https://kit.fontawesome.com/e98e713854.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <style>
    .badge {
      color: #fff;
      font-size: 0.7rem;
      padding: 0.2rem;
      background-color: #cf5614;
      border-radius: 100%;
    }
  </style>