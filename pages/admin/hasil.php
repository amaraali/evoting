<?php
require 'ini_header.php';
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Hasil Voting</h1>
    <a class="btn btn-success" href="export.php" target="_blank">Export Excel</a>
  </div>
  <?php
  if (!isset($_SESSION["login"])) {
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
    // dd($hasil_jurusan);
  }

  $jurusans = query("SELECT * FROM jurusan");
  ?>

  <form method="get" action="">
    <div class="row">
      <label for="nama_jurusan">Jurusan</label>
      <div class="col-xl-4 col-lg-4 col-md-8 col-sm-10 ">
        <select name="jurusan" id="jurusan" class="form-control custom-select">
          <option value="">-- Pilih Jurusan</option>
          <?php foreach ($jurusans as $key => $value) : ?>
            <option value="<?= $value["kode_jurusan"]; ?>"><?= $value["nama_jurusan"] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-1">
        <button class="btn btn-primary " type="submit" name="submit">Pilih</button>
      </div>
    </div>
  </form>



  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Hasil Vote</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Grafik</button>
    </li>
  </ul>
  <?php if ($is_tampil == true) : ?>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <!-- ==================================Hasil====================================== -->
        <form action="<?= $config["base_url"]; ?>actions/action_vote.php" method="post">
          <div class="album py-5">
            <div class="container">
              <div class="card">
                <h3 class="card-title text-center p-3">Hima <?php echo $filter_fakultas["nama_jurusan"]; ?></h3>
                <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                  <?php foreach ($hasil_jurusan as $key => $value) : ?>
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
                          <h3 class="text-center"><?= $value["suara"] . " Suara"; ?></h3>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>

          <!-- --------------------Fakultas----------------------------->

          <div class="album py-5 bg-light">
            <div class="container">
              <div class="card">
                <h3 class="card-title text-center p-3">BEM <?php echo $filter_fakultas["nama_fakultas"]; ?></h3>
                <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                  <?php foreach ($hasil_fakultas as $key => $value) : ?>
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
                          <h3 class="text-center"><?= $value["suara"] . " Suara"; ?></h3>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>

          <!-----------------------Univ----------------------------->

          <div class="album py-5 bg-light">
            <div class="container">
              <div class="card">
                <h3 class="card-title text-center p-3">BEM KM</h3>
                <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  <?php foreach ($hasil_univ as $key => $value) : ?>
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
                          <h3 class="text-center"><?= $value["suara"] . " Suara"; ?></h3>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- ===================================CHART============================== -->
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="album pt-5 pb-2 bg-light">
          <div class="container">
            <div class="card">
              <h3 class="card-title text-center p-3">Hima <?php echo $filter_fakultas["nama_jurusan"]; ?></h3>
              <canvas id="chartJurusan" style="max-height: 300px;"></canvas>
            </div>
          </div>
        </div>
        <div class="album py-2 bg-light">
          <div class="container">
            <div class="card">
              <h3 class="card-title text-center p-3">BEM <?php echo $filter_fakultas["nama_fakultas"]; ?></h3>
              <canvas id="chartFakultas" style="max-height: 300px;"></canvas>
            </div>
          </div>
        </div>
        <div class="album pt-2 pb-5 bg-light">
          <div class="container">
            <div class="card">
              <h3 class="card-title text-center p-3">BEM KM</h3>
              <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <canvas id="chartUniv" style="max-height: 300px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>


    <!-- ------------- QUERY-GRAFIK---------------- -->
    <?php
    // query grafik jurusan
    if ($is_tampil == true) {
      foreach ($hasil_jurusan as $key => $value) {
        $grafik_suara_jur[] = $value['suara'];
        $grafik_nomor_jur[] = "'" . $value['no_urut'] . ". " . $value['nama_ketua'] . " - " . $value['nama_wakil'] . "'";
      }
      $grafik_suara_jur = implode(",", $grafik_suara_jur);
      $grafik_nomor_jur = implode(",", $grafik_nomor_jur);

      // query grafik fakultas
      foreach ($hasil_fakultas as $key => $value) {
        $grafik_suara_fak[] = $value['suara'];
        $grafik_nomor_fak[] = "'" . $value['no_urut'] . ". " . $value['nama_ketua'] . " - " . $value['nama_wakil'] . "'";
      }
      $grafik_suara_fak = implode(",", $grafik_suara_fak);
      $grafik_nomor_fak = implode(",", $grafik_nomor_fak);
      // dd($grafik_nomor_fak);

      // $grafik_suara_fak = array_column($hasil_fakultas, 'suara');
      // $grafik_suara_fak = implode(",", $grafik_suara_fak);
      // $grafik_nomor_fak = array_column($hasil_fakultas, 'no_urut');
      // $grafik_nomor_fak = implode(",", $grafik_nomor_fak);
      // dd($grafik_suara_fak);

      // query grafik univ
      foreach ($hasil_univ as $key => $value) {
        $grafik_suara_univ[] = $value['suara'];
        $grafik_nomor_univ[] = "'" . $value['no_urut'] . ". " . $value['nama_ketua'] . " - " . $value['nama_wakil'] . "'";
      }
      $grafik_suara_univ = implode(",", $grafik_suara_univ);
      $grafik_nomor_univ = implode(",", $grafik_nomor_univ);
    }
    ?>
    <!-- ------------------END-------------------- -->


</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- -------------- script grafik JURUSAN---------- -->
<script>
  const labels1 = [<?= $grafik_nomor_jur ?>];
  const data1 = {
    labels: labels1,
    datasets: [{
      label: 'Jumlah suara',
      backgroundColor: [
        '#FF6F59',
        '#254441',
        '#43AA8B',
        '#B2B09B',
        '#DB504A'
      ],
      data: [<?= $grafik_suara_jur ?>],
    }]
  };
  const config1 = {
    type: 'bar',
    data: data1,
    options: {
      plugins: {
        legend: {
          display: false
        }
      }
    }
  };
  const chartJurusan = new Chart(
    document.getElementById('chartJurusan'),
    config1
  );

  // <!--------------- script grafik FAKULTAS---------------- -->
  const labels2 = [<?= $grafik_nomor_fak ?>];
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Jumlah suara',
      backgroundColor: [
        '#011627',
        '#FF3366',
        '#2EC4B6',
        '#20A4F3',
        '#F6F7F8'
      ],
      data: [<?= $grafik_suara_fak ?>],
    }]
  };
  const config2 = {
    type: 'bar',
    data: data2,
    options: {
      plugins: {
        legend: {
          display: false
        }
      }
    }
  };
  const chartFakultas = new Chart(
    document.getElementById('chartFakultas'),
    config2
  );

  // <!-- ------------------- script grafik UNIV --------------------- -->
  const labels3 = [<?= $grafik_nomor_univ ?>];
  const data3 = {
    labels: labels3,
    datasets: [{
      label: 'Jumlah suara',
      backgroundColor: [
        '#F95738',
        '#EE964B',
        '#F4D35E',
        '#0D3B66',
        '#FAF0CA'
      ],
      data: [<?= $grafik_suara_univ ?>],
    }]
  };
  const config3 = {
    type: 'bar',
    data: data3,
    options: {
      plugins: {
        legend: {
          display: false
        }
      }
    }
  };
  const chartUniv = new Chart(
    document.getElementById('chartUniv'),
    config3
  );

  // const ctx3 = document.getElementById('chartUniv');
  // const chartUniv = new Chart(ctx3, {
  //   type: 'pie',
  //   data: {
  //     labels: [<?= $grafik_nomor_univ ?>],
  //     datasets: [{
  //       label: 'Jumlah suara',
  //       data: [<?= $grafik_suara_univ ?>],
  //       backgroundColor: [
  //         'rgba(54, 162, 235)',
  //         'rgba(153, 102, 255)',
  //         'rgba(255, 99, 132)',
  //         'rgba(75, 192, 192)',
  //         'rgba(201, 203, 207)',
  //         'rgba(255, 159, 64)'
  //       ],
  //       hoverOffset: 4
  //     }]
  //   }
  // });
</script>