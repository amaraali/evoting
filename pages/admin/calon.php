<?php
require 'ini_header.php';

if (!isset($_SESSION["login"])) {
  redirect("../login");
}

$calon = query("SELECT calon.*,jurusan.kode_jurusan, jurusan.nama_jurusan, fakultas.kode_fakultas, fakultas.nama_fakultas, tingkatan.nama_tingkatan FROM calon 
                JOIN tingkatan ON calon.id_tingkatan = tingkatan.id
                LEFT JOIN jurusan ON calon.id_unit = jurusan.kode_jurusan
                LEFT JOIN fakultas ON calon.id_unit = fakultas.kode_fakultas");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Calon</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="edit_calon.php" type="button" class="btn btn-sm btn-outline-secondary">Tambah</a>
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
          <th>Ketua</th>
          <th>Wakil</th>
          <th>No Urut</th>
          <th>Jurusan/Fakultas</th>
          <th>Tingkatan</th>
          <th>Foto</th>
          <th>Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($calon as $key => $value) : ?>
          <tr>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <div id="nama_ketua">
                <?php echo $value["nama_ketua"]; ?>
              </div>
            </td>
            <td>
              <div id="nama_wakil">
                <?php echo $value["nama_wakil"]; ?>
              </div>
            </td>
            <td>
              <div id="no_urut">
                <?php echo $value["no_urut"]; ?>
              </div>
            </td>
            <td>
              <div id="id_unit">
                <?php
                if ($value["id_tingkatan"] == 1) {
                  echo 'HIMA ' . $value["nama_jurusan"];
                } elseif ($value["id_tingkatan"] == 2) {
                  echo 'BEM ' . $value["nama_fakultas"];
                } else {
                  echo "BEM KM";
                }
                ?>
              </div>
            </td>
            <td>
              <div id="nama_tingkatan">
                <?php echo ucwords($value["nama_tingkatan"]); ?>
              </div>
            </td>
            <td>
              <div id="images">
                <?php echo $value["images"]; ?>
              </div>
            </td>
            <td>
              <a class="btn btn-success btn-sm" href="<?= $config['base_url']; ?>pages/admin/edit_calon.php?id=<?php echo $value["id"]; ?>">Ubah</a>
              <a class="btn btn-danger btn-sm" href="<?= $config['base_url']; ?>actions/action_hapus_calon.php?id=<?php echo $value["id"]; ?>" onclick="return confirm('Klik Ok untuk menghapus');">Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>