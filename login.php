<?php
session_start();
require 'functions.php';

// cek cookie
// if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
// 	$id = $_COOKIE['id'];
// 	$key = $_COOKIE['key'];

// 	// cek username berdasarkan cookie
// 	$result = mysqli_query($conn, "SELECT username FROM users WHERE id=$id" );
// 	$row = mysqli_fetch_assoc($result);

// 	// cek cookie dan username
// 	if($key === hash('sha256', $row['username'])) {
// 		$_SESSION['login'] = true;
// 	}
// }

if (isset($_SESSION["login"])) {
  redirect("pages/surat_suara");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Login</title>




  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="images/logo.png" sizes="180x180">
  <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="images/logo.png" color="#7952b3">
  <link rel="icon" href="images/logo.png">
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

    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #ded5d5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="actions/action_login.php" method="post">
      <img class="mb-4" src="images/logo.png" alt="" width="100" height="87">
      <h1 class="h3 mb-3 fw-normal">Login</h1>
      <label for="inputEmail" class="visually-hidden">Username</label>
      <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="visually-hidden">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button><br><br>
      <?php
      if (isset($_GET["pesan"])) {
        echo $_GET["pesan"];
      }
      ?>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>

</body>

</html>