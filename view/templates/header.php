<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">

    <title>Productos</title>
</head>
<body>
<nav class="barraNavegacion navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">Mi Tienda</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?type=index&function=index&p=about">Camisas</a></li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item my-auto"><span style="color:white">Usuario </span></li>
        <li class="nav-item"><a class="nav-link" href="#">Login</a></li>

    </ul>
</nav>

<h1 class="jumbotron text-center titNivel1">
    <i class="fab fa-shopify"></i>
    Mi Tienda de productos </h1>

<?php
ini_set('display_errors', 1);
if (!isset($_SESSION)) {
    session_start();
};
if (!empty($_SESSION['mensaje'])) {
    ?>
    <div class="mt-2 alert alert-<?php echo $_SESSION['color']; ?>
             alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['mensaje']; ?>
    </div>
    <?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['color']);
}//end if
?>
