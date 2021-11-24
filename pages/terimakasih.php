<?php
session_start();
require '../functions.php';
// require 'parts/header.php';
require 'parts/menu.php';

if (!isset($_SESSION["login"])) {
  redirect("login");
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="amara, bharaka, fachrizal, ghamal">
  <meta name="generator" content="Hugo 0.79.0">
  <title>e-Voting Pemira 2020</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">


  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="../images/logo.png" sizes="180x180">
  <link rel="icon" href="../images/logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="../images/logo.png" color="#7952b3">
  <link rel="icon" href="../images/logo.png" type="image/png">
  <meta name="theme-color" content="#7952b3">


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
</head>

<body>
  <main>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Terima Kasih!</h4>
          <p>Telah berpartisipasi pada Pemilihan Umum Raya 2020</p>
          <a type="button" class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>

  </main>
  <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>