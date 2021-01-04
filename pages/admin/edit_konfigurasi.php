<!-- <?php 
include 'ini_header.php';

if(!isset($_SESSION["login"])){
  redirect("login");
  exit;
}
?>

<div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto">
        <form class="needs-validation" method="post" action="" novalidate>
            <input type="hidden" class="form-control" id="nama" name="nama" value='<?php echo $_SESSION["nama"];?>'>
            <div class="mb-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama" required name="nama" value='<?php echo $_SESSION["nama"];?>' disabled>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                Waktu Buka : <input id="startDate" width="276" name="waktu_buka" autocomplete="off" />
              </div>
              <div class="col-md-5 mb-3">
                Waktu Tutup : <input id="endDate" width="276" name="waktu_tutup" autocomplete="off" />
              </div>
              <script>
                var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                $('#startDate').datetimepicker({
                    uiLibrary: 'bootstrap4',
                    iconsLibrary: 'fontawesome',
                    minDate: today,
                    maxDateTime: function () {
                        return $('#endDate').val();
                    }
                });
                $('#endDate').datetimepicker({
                    uiLibrary: 'bootstrap4',
                    iconsLibrary: 'fontawesome',
                    minDateTime: 'today'
                    
                });
              </script>
            </div>           
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Kirim</button>
        </form>
      </div>
    </div>
 -->