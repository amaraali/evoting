<?php 
include 'ini_header.php';

if(!isset($_SESSION["login"])){
  redirect("login");
  exit;
}

$edit = false;

if(isset($_GET["id"])){
  // berati ngedit
  $edit = true ;
  $id = $_GET["id"];
  $baris = query("SELECT * FROM users WHERE id = $id");
  if (count($baris)  == 1) {
    $data = $baris[0];
  } else{
    redirect("pages/admin/user", ["pesan" => tulis_alert('danger', 'Id tidak valid.')]);

  }
}

?>


 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php if($edit) {echo "Edit User";} else {echo "Tambah User";} ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="user.php" type="button" class="btn btn-sm btn-outline-secondary">Kembali</a>
          </div>
        </div>     
      </div>

      <div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 ">
        <form class="needs-validation" method="post" action="../../actions/action_user.php" novalidate>
            <?php if ($edit): ?>
              <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
            <?php endif ?>
            <div class="mb-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required value="<?php if($edit): echo $data["nama"]; endif;?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" required value="<?php if($edit) echo $data["nim"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" autocomplete="off" required value="<?php if($edit) echo $data["username"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" name="password" autocomplete="off" required placeholder="<?php if($edit) echo 'Kosongkan jika tidak ingin merubah'; ?>" >
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>


            <div class="mb-3">
              <label for="kode_jurusan">Kode Jurusan</label>
              <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" autocomplete="off" required value="<?php if($edit) echo $data["kode_jurusan"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
             
          <hr class="mb-4">
          <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">
            <?php if($edit) {
              echo "Ubah data";} else {echo "Tambah Data";} ?></button>
        </form>
      </div>
    </div>
</main>