<?php 
session_start(); 
require '../functions.php';
// require 'parts/header.php';
require 'parts/menu.php';

if (!isset($_SESSION["login"])){
	redirect("login");
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
<?php 
    $cfg = query("SELECT * FROM konfig");
    if (strtotime(date("Y-m-d H:i:s")) < strtotime($cfg[0]["waktu_buka"])) {
      echo tulis_alert("danger", "Waktu vote belum dimulai!");
      die;
    } elseif (strtotime(date("Y-m-d H:i:s")) > strtotime($cfg[0]["waktu_tutup"])) {
      echo tulis_alert("danger", "Waktu vote sudah berakhir!");
      die;
    }

    $kalo = query("SELECT id_user FROM vote WHERE id_user = $_SESSION[id_user]");
    if (count($kalo)>0) {
      echo tulis_alert("danger", "Anda sudah memilih, pilihan tidak dapat diubah kembali.");
      die;
    }
 ?>
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
