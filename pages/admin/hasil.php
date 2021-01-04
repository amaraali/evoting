<?php 
require 'ini_header.php';
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Hasil Voting</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">

      </div>
    </div>
  </div>
    <?php 
    if (!isset($_SESSION["login"])){
      redirect("../login");
    }

    $is_tampil = false;

    if (isset($_GET['submit'])) {
        $is_tampil = true;
        $filter_jurusan = $_GET['jurusan'];
        $filter_fakultas = query("SELECT * FROM jurusan 
                                  JOIN fakultas ON jurusan.kode_fakultas=fakultas.kode_fakultas 
                                  WHERE kode_jurusan = $filter_jurusan")[0];
        $hasil_univ = query("SELECT count(*) as suara, id_calon, no_urut, nama_ketua, nama_wakil
                            FROM vote
                            JOIN calon ON vote.id_calon = calon.id
                            WHERE id_calon IN (SELECT id FROM calon WHERE id_tingkatan = 3) 
                            GROUP BY id_calon ORDER BY no_urut");
        $hasil_fakultas = query("SELECT count(*) as suara, id_calon, no_urut, nama_ketua, nama_wakil
                            FROM vote 
                            JOIN calon ON vote.id_calon = calon.id
                            WHERE id_calon IN (SELECT id FROM calon WHERE id_tingkatan = 2 AND id_unit = $filter_fakultas[kode_fakultas]) 
                            GROUP BY id_calon ORDER BY no_urut");
        $hasil_jurusan = query("SELECT count(*) as suara, id_calon, no_urut, nama_ketua, nama_wakil
                            FROM vote 
                            JOIN calon ON vote.id_calon = calon.id
                            WHERE id_calon IN (SELECT id FROM calon WHERE id_tingkatan = 1 AND id_unit = $filter_jurusan) 
                            GROUP BY id_calon ORDER BY no_urut");
        // dd($hasil_fakultas);
    }

    $jurusans = query("SELECT * FROM jurusan");
    
    ?>

<form  method="get" action="" >
  <div class="row">
    <label for="nama_jurusan">Jurusan</label>
    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-10 ">
      <select name="jurusan" id="jurusan" class="form-control custom-select">
        <option value="">-- Pilih Jurusan</option>
        <?php foreach ($jurusans as $key => $value): ?>
          <option value="<?= $value["kode_jurusan"]; ?>"><?= $value["nama_jurusan"]?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-1">
          <button class="btn btn-primary " type="submit" name="submit">Pilih</button>
    </div>
  </div>
</form>



<!-- -----------------------------------------Hasil-------------------------------------------------- -->
<?php if ($is_tampil==true): ?>
  <!-- --------------------Jurusan--------------------------- -->

<form action="<?= $config["base_url"];?>actions/action_vote.php" method="post">
  <div class="album py-5 bg-light">
    <div class="container">
    <div class="card">
  <h3 class="card-title text-center p-3">Hima <?php echo $filter_fakultas["nama_jurusan"]; ?></h3>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php foreach ($hasil_jurusan as $key => $value):?>
        <div class="col">
          <div class="card shadow-sm mb-4">
            <h5 class="card-title text-center p-2"><?= $value["no_urut"]; ?></h5>
            <div class="row text-center">
            <div class="col-6 ">
              <img src="../../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
              <p class="card-text"><?= $value["nama_ketua"]; ?></p>
          </div>
          <div class="col-6">
            <img src="../../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
            <p class="card-text"><?= $value["nama_wakil"]; ?></p>
          </div>
          </div>
            <div class="card-body">
                <h3 class="text-center"><?= $value["suara"]." Suara";?></h3>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
  </div>

<!-- --------------------Fakultas--------------------------- -->

  <div class="album py-5 bg-light">
    <div class="container">
    <div class="card">
  <h3 class="card-title text-center p-3">BEM <?php echo $filter_fakultas["nama_fakultas"]; ?></h3>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php foreach ($hasil_fakultas as $key => $value): ?>
        <div class="col">
          <div class="card shadow-sm mb-4">
            <h5 class="card-title text-center p-2"><?= $value["no_urut"]; ?></h5>
            <div class="row text-center">
            <div class="col-6 ">
              <img src="../../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
              <p class="card-text"><?= $value["nama_ketua"]; ?></p>
          </div>
          <div class="col-6">
            <img src="../../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
            <p class="card-text"><?= $value["nama_wakil"]; ?></p>
          </div>
          </div>
            <div class="card-body">
               <h3 class="text-center"><?= $value["suara"]." Suara";?></h3>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
       </div>
    </div>
  </div>
</div>
  
<!-- --------------------Univ--------------------------- -->

  <div class="album py-5 bg-light">
    <div class="container">
    <div class="card">
  <h3 class="card-title text-center p-3">BEM KM</h3>
      <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php foreach ($hasil_univ as $key => $value):?>
        <div class="col">
          <div class="card shadow-sm mb-4">
            <h5 class="card-title text-center p-2"><?= $value["no_urut"]; ?></h5>
            <div class="row text-center">
            <div class="col-6 ">
              <img src="../../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
              <p class="card-text"><?= $value["nama_ketua"]; ?></p>
          </div>
          <div class="col-6">
            <img src="../../images/placeholder.png" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;" alt="...">
            <p class="card-text"><?= $value["nama_wakil"]; ?></p>
          </div>
          </div>
            <div class="card-body">
                <h3 class="text-center"><?= $value["suara"]." Suara";?></h3>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
  </div>
  </form>
<?php endif ?>





</main>
      