<?php
session_start();
require '../../functions.php';

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="amara, fachrizal, bharaka diwalik, ghamal, zaenal">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Administrator</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

  <link rel="apple-touch-icon" href="../../images/logo.png" sizes="180x180">
  <link rel="icon" href="../../images/logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../../images/logo.png" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="../../images/logo.png" color="#7952b3">
  <link rel="icon" href="../../images/logo.png">
  <meta name="theme-color" content="#7952b3">

  <!-- ---------Date Time Picker -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link href="../../css/font-awesome.min.css" rel="stylesheet">
  <link href="../../css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <script src="../../js/jquery.js"></script>
  <script>
    window.jQuery
  </script>
  <script src="../../js/bootstrap.js"></script>
  <script src="../../js/gijgo.min.js" type="text/javascript"></script>
  <!-- ------------------------- -->

</head>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>

<link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<!-- Custom styles for this template -->
<link href="../../css/konfigurasi.css" rel="stylesheet">

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
    <img src="../../images/logo.png" alt="" width="30" height="30" class="d-inline-block align-top"> e-Voting
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../../logout.php">Logout</a>
    </li>
  </ul>
</header>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">

          <?php $uri = $_SERVER['REQUEST_URI']; ?>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'dashboard.php') !== false) ? 'active' : '' ?>" aria-current="page" href="dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'calon.php') !== false) ? 'active' : '' ?>" href="calon.php">
                <span data-feather="user"></span>
                Calon
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'hasil.php') !== false) ? 'active' : '' ?>" href="hasil.php">
                <span data-feather="bar-chart-2"></span>
                Hasil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'user.php') !== false) ? 'active' : '' ?>" href="user.php">
                <span data-feather="users"></span>
                User
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'jurusan.php') !== false) ? 'active' : '' ?>" href="jurusan.php">
                <span data-feather="toggle-right"></span>
                Jurusan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'fakultas.php') !== false) ? 'active' : '' ?>" href="fakultas.php">
                <span data-feather="toggle-right"></span>
                Fakultas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (strpos($uri, 'konfigurasi.php') !== false) ? 'active' : '' ?>" href="konfigurasi.php">
                <span data-feather="tool"></span>
                Konfigurasi
              </a>
            </li>
          </ul>
        </div>

    </div>
  </div>
  <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../../js/konfigurasi.js"></script>

</body>

</html>