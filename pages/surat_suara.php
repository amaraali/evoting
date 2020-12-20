<?php 
require 'parts/header.php';
require 'parts/menu.php';

if (!isset($_SESSION["login"])){
	redirect("../login");
}

$kode_jurusan = $_SESSION["kode_jurusan"];
$jurusan = query("SELECT * FROM jurusan WHERE kode_jurusan=$kode_jurusan")[0];

$fakultas = query("SELECT * FROM fakultas WHERE kode_fakultas = $jurusan[kode_fakultas] ")[0];

$calon_jurusan = query("SELECT * FROM calon WHERE id_unit = $kode_jurusan AND id_tingkatan = 1 ORDER BY no_urut");
$calon_fakultas = query("SELECT * FROM calon WHERE id_unit = $jurusan[kode_fakultas] AND id_tingkatan = 2 ORDER BY no_urut");
$calon_univ = query("SELECT * FROM calon WHERE id_tingkatan = 3 ORDER BY no_urut");

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
<form action="<?= $config["base_url"];?>actions/action_vote.php" method="post">
  <div class="album py-5 bg-light">
    <div class="container">
    <div class="card">
	<h3 class="card-title text-center p-3">Hima <?php echo $jurusan["nama_jurusan"]; ?></h3>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php foreach ($calon_jurusan as $key => $value):?>
        <div class="col">
          <div class="card shadow-sm mb-4">
          	<h5 class="card-title text-center p-2"><?= $value["no_urut"]; ?></h5>
          	<div class="row text-center">
          	<div class="col-6 ">
           		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
           		<p class="card-text"><?= $value["nama_ketua"]; ?></p>
        	</div>
        	<div class="col-6">
        		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
        		<p class="card-text"><?= $value["nama_wakil"]; ?></p>
        	</div>
        	</div>
            <div class="card-body">
              	<div class="form-check d-flex justify-content-center align-items-center">
					<input class="form-check-input" type="radio" name="pilihjurusan" id="pilihjurusan" value="<?= $value["id"]; ?>">
              	</div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
  </div>






  <div class="album py-5 bg-light">
    <div class="container">
    <div class="card">
	<h3 class="card-title text-center p-3">BEM <?php echo $fakultas["nama_fakultas"]; ?></h3>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php foreach ($calon_fakultas as $key => $value): ?>
        <div class="col">
          <div class="card shadow-sm mb-4">
          	<h5 class="card-title text-center p-2"><?= $value["no_urut"]; ?></h5>
          	<div class="row text-center">
          	<div class="col-6 ">
           		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
           		<p class="card-text"><?= $value["nama_ketua"]; ?></p>
        	</div>
        	<div class="col-6">
        		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
        		<p class="card-text"><?= $value["nama_wakil"]; ?></p>
        	</div>
        	</div>
            <div class="card-body">
              	<div class="form-check d-flex justify-content-center align-items-center">
					<input class="form-check-input" type="radio" name="pilihfakultas" id="pilihfakultas" value="<?= $value["id"]; ?>">
              	</div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
       </div>
    </div>
  </div>
</div>
	

	<div class="album py-5 bg-light">
    <div class="container">
    <div class="card">
	<h3 class="card-title text-center p-3">BEM KM</h3>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php foreach ($calon_univ as $key => $value):?>
        <div class="col">
          <div class="card shadow-sm mb-4">
          	<h5 class="card-title text-center p-2"><?= $value["no_urut"]; ?></h5>
          	<div class="row text-center">
          	<div class="col-6 ">
           		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
           		<p class="card-text"><?= $value["nama_ketua"]; ?></p>
        	</div>
        	<div class="col-6">
        		<img src="../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
        		<p class="card-text"><?= $value["nama_wakil"]; ?></p>
        	</div>
        	</div>
            <div class="card-body">
              	<div class="form-check d-flex justify-content-center align-items-center">
					<input class="form-check-input" type="radio" name="pilihuniv" id="pilihuniv" value="<?= $value["id"]; ?>">
              	</div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row justify-content-center">
  	<div class="col-3">
  		<button class="btn w-100 btn-lg btn-primary" name="vote" type="submit">Vote</button>
  	</div>
  	</div>
  </div>
  </form>
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
  </div>
</footer>


    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      
  </body>
</html>
