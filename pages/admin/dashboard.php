<?php
require 'ini_header.php';
// require 'ini_footer.php';

if (!isset($_SESSION["login"])) {
  redirect("../login");
}

?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="">Selamat Datang Administrator!</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>


  <h3>Sistem e-Voting Pemira 2021</h3>

</main>