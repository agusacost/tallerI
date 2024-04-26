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
  <link rel="stylesheet" href="assets\css\header.css">
  <link rel="stylesheet" href="assets/css/footer-fixs.css">
  <!-- principal -->
  <link rel="stylesheet" href="assets\css\principal-banner-fix.css">
  <link rel="stylesheet" href="assets\css\principal-categories.css">
  <link rel="stylesheet" href="assets\css\principal-products-fix.css">
  <link rel="stylesheet" href="assets\css\principal-productos-2.css">

  <!-- contact -->
  <link rel="stylesheet" href="assets\css\contact.css">
  <!-- about -->
  <link rel="stylesheet" href="assets\css\about.css">
  <!-- preg frecuentes -->
  <link rel="stylesheet" href="assets\css\preg-frec-fix.css">
  <!-- terminos -->
  <link rel="stylesheet" href="assets\css\terms.css">
  <!-- login -->
  <link rel="stylesheet" href="assets\css\login.css">
  <!-- productos -->
  <link rel="stylesheet" href="assets\css\products\allproducts.css">
  

  <title>KeepGreen</title>

</head>

<body>
  <header>
    <!-- Nav -->
    <nav>
      <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="assets/img/logo.jpeg" alt="logo" width="200">
      </a>
      <ul id="menuList" class="menu-list">
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li><a href="<?= base_url('/products') ?>">Productos</a></li>
        <li><a href="<?= base_url('/about') ?>">Quiénes somos</a></li>
        <li><a href="<?= base_url('/contact') ?>">Contacto</a></li>
        <li><a href="<?= base_url('/login') ?>">Login</a></li>
      </ul>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>