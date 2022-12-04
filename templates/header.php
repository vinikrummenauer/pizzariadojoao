<?php 

  include("process/conn.php");

  $msg = "";

  if(isset($_SESSION["msg"])) {

    $msg = $_SESSION["msg"];
    $status = $_SESSION["status"];

    $_SESSION["msg"] = "";
    $_SESSION["status"] = "";

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faça seu Pedido!</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <!-- App CSS -->
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg">
    <div class="conatiner px-4 px-lg-5">
      <a href="index.php" class="navbar-brand">
        <img src="img/pizza.svg" alt="Pizzaria do João" id="brand-logo">
      </a>
      <a class="navbar-brand" href="index.php">Pizzaria do João</a>
      <a href="logout.php" style="margin-left: 1000px; text-decoration: none;">Logout</a>
    </div>
  </nav>
  <!-- <header>
    <nav class="navbar navbar-expand-lg">
      <a href="index.php" class="navbar-brand">
        <img src="img/pizza.svg" alt="Pizzaria do João" id="brand-logo">
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Pizzaria do João</a>
          </li>
        </ul>
      </div>
    </nav>
  </header> -->
  <?php if($msg != ""): ?>
    <div class="alert alert-<?= $status ?>">
      <p><?= $msg ?></p>
    </div>
  <?php endif; ?>