<?php 
require 'parts/header.php';
require 'parts/menu.php';

if (!isset($_SESSION["login"])){
	redirect("../login");
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Album example · Bootstrap v5.0</title>
    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
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
    <!-- NAVBARRRRZZ -->
<!-- <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
 
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
 -->
<main>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <div class="col">
          <div class="card shadow-sm">
          	<h5 class="card-title text-center p-2">Nomor Paslon</h5>
          	<div class="row text-center">
          	<div class="col-6 ">
           		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
           		<p class="card-text">Nama Calon</p>
        	</div>
        	<div class="col-6">
        		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
        		<p class="card-text">Nama Calon</p>
        	</div>
        	</div>
            <div class="card-body">
              	<div class="form-check d-flex justify-content-center align-items-center">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              	</div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
          	<h5 class="card-title text-center p-2">Nomor Paslon</h5>
          	<div class="row text-center">
          	<div class="col-6 ">
           		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
           		<p class="card-text">Nama Calon</p>
        	</div>
        	<div class="col-6">
        		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
        		<p class="card-text">Nama Calon</p>
        	</div>
        	</div>
            <div class="card-body">
              	<div class="form-check d-flex justify-content-center align-items-center">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              	</div>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card shadow-sm">
          	<h5 class="card-title text-center p-2">Nomor Paslon</h5>
          	<div class="row text-center">
          	<div class="col-6 ">
           		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
           		<p class="card-text">Nama Calon</p>
        	</div>
        	<div class="col-6">
        		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
        		<p class="card-text">Nama Calon</p>
        	</div>
        	</div>
            <div class="card-body">
              	<div class="form-check d-flex justify-content-center align-items-center">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              	</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      
  </body>
</html>
