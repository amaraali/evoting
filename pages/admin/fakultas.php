<?php 
require 'ini_header.php';
// require 'ini_footer.php'; 

if (!isset($_SESSION["login"])){
  redirect("login");
}

$fakultas = query("SELECT * FROM fakultas");

?>

 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Fakultas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="edit_fakultas.php" type="button" class="btn btn-sm btn-outline-secondary">Tambah</a>
          </div>
        </div>
      </div>
   <?php
      if (isset($_GET["pesan"])) {
        echo $_GET["pesan"];
      }
    ?>   
  <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Fakultas</th>
              <th>Kode Fakultas</th>
              <th>Menu</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1; ?>
          <?php foreach ($fakultas as $key => $value) : ?>
            <tr>
              <td>
                <?php echo $i; ?>
              </td>
              <td>
                <div id="nama_fakultas">
                  <?php echo $value["nama_fakultas"]; ?>
                </div>
              </td>
              <td>
                <div id="kode_fakultas">
                  <?php echo $value["kode_fakultas"]; ?>
                </div>
              </td>
              <td>
                <a class="btn btn-success btn-sm" href="<?= $config['base_url'];?>pages/admin/edit_fakultas.php?id=<?php echo $value["id"]; ?>">Ubah</a>
                <a class="btn btn-danger btn-sm" href="<?= $config['base_url'];?>actions/action_hapus_fakultas.php?id=<?php echo $value["id"]; ?>" onclick="return confirm('Klik Ok untuk menghapus');">Hapus</a>
              </td>
            </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>