<?php
require 'ini_header.php';
// require 'ini_footer.php'; 

if (!isset($_SESSION["login"])) {
  redirect("../login");
}

$konfig = query("SELECT * FROM konfig");

$vote = false;
if (count($konfig) == 1) {
  $vote = true;
  $cfg = $konfig[0];
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Konfigurasi</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <!-- <a href="edit_jurusan.php" type="button" class="btn btn-sm btn-outline-secondary">Tambah</a> -->
      </div>
    </div>
  </div>

  <div class="container">
    <?php
    if (isset($_GET["pesan"])) {
      echo $_GET["pesan"];
    }
    ?>
    <div class="col-lg-6 col-md-6 col-sm-10">
      <form method="post" action="<?= $config["base_url"]; ?>actions/action_konfigurasi.php">
        <div class="mb-3">
          <label for="nama">Nama Pemilu</label>
          <input type="text" class="form-control" id="nama_pemilu" placeholder="Nama" required name="nama_pemilu" value="<?php if ($vote) : echo $cfg['nama_pemilu'];
                                                                                                                          endif; ?>">
          <div class="invalid-feedback">
            Kolom ini tidak boleh kososng.
          </div>
        </div>


        <!-- <div class="row"> -->
        <div class="col-md-5 mb-3">
          Waktu Buka : <input id="startDate" width="276" name="waktu_buka" autocomplete="off" value="<?php if ($vote) : echo $cfg['waktu_buka'];
                                                                                                      endif; ?>" />
        </div>
        <div class="col-md-5 mb-3">
          Waktu Tutup : <input id="endDate" width="276" name="waktu_tutup" autocomplete="off" value="<?php if ($vote) : echo $cfg['waktu_tutup'];
                                                                                                      endif; ?>" />
        </div>
        <script>
          var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
          $('#startDate').datetimepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDateTime: function() {
              return $('#endDate').val();
            }
          });
          $('#endDate').datetimepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDateTime: 'today'

          });
        </script>
        <!-- </div> -->
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>