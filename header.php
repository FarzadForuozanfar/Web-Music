<?php 
  session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Webapp Music">
    <meta name="keywords" content="html, css, bootstrap5, js, php, sql, database, music, music website, webapp music">
    <meta name="author" content="farzad foroozanfar">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Webapp Music</title>
    <link rel="shortcut icon" href="img/icon.jpg" type="image/x-icon">
</head>
<body>
<nav class="navbar rounded-4 navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo" width="50px" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="musics.php">Musics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="albums.php">Albums</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="singers.php">Artists</a>
        </li>
        <?php if(!empty($_SESSION['login_admin'])):?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>

          <li class="nav-item mx-5">
            <a class="nav-link active btn btn-danger text-light" aria-current="page" href="admin_loguot.php">Log out</a>
          </li>

        <?php endif; ?>
      </ul>
      <form class="d-flex" role="search">
        <?php if(empty($_SESSION['login_admin'])):?>
          <a href="login_admin.php" class="btn btn-success mx-4" type="button">Login</a>
        <?php endif; ?>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>