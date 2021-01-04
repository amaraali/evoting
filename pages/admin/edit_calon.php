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

$tingkatan = query("SELECT * FROM tingkatan");

?>


 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php if($edit) {echo "Edit Calon";} else {echo "Tambah Calon";} ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="calon.php" type="button" class="btn btn-sm btn-outline-secondary">Kembali</a>
          </div>
        </div>     
      </div>

      <div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 ">
        <form class="needs-validation" method="post" action="../../actions/action_calon.php" novalidate>
            <?php if ($edit): ?>
              <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
            <?php endif ?>
            <div class="mb-3">
              <label for="nama_ketua">Nama Ketua</label>
              <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" autocomplete="off" required value="<?php if($edit): echo $data["nama_ketua"]; endif;?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
            <div class="mb-3">
              <label for="nama_wakil">Nama Wakil</label>
              <input type="text" class="form-control" id="nama_wakil" name="nama_wakil" autocomplete="off" required value="<?php if($edit): echo $data["nama_wakil"]; endif;?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="no_urut">No Urut</label>
              <input type="text" class="form-control" id="no_urut" name="no_urut" autocomplete="off" required value="<?php if($edit) echo $data["no_urut"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlSelect1">Tingkat</label>
                  <select class="form-control" id="exampleFormControlSelect1" required name="tingkatan">
                    <option value="">--Pilih--</option>
                    <?php foreach ($tingkatan as $key => $value) :?>
                      <option value="<?= $value['id'] ?>"><?= ucwords($value['nama_tingkatan']) ?></option>
                    <?php endforeach; ?>
                    
                  </select>
            </div>

            <div class="mb-3">
              <label for="id_unit">Kode Jurusan atau Fakultas</label>
              <input type="text" class="form-control" id="id_unit" name="id_unit" autocomplete="off" required value="<?php if($edit) echo $data["id_unit"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>


            <div class="mb-3">
              <label for="images">Images</label>
              <input type="text" class="form-control" id="images" name="images" autocomplete="off" required value="<?php if($edit) echo $data["images"]; ?>">
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