<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- CSS only -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">
    <title>Productos</title>
    <style>
        .bg-custom-2 {
            background-color: rgba(0, 0, 0, 255);
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <a class="navbar-brand" href="#"> Rubber Store</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/proy_daw/index.php?type=shirt">Camisetas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/proy_daw/index.php?type=tazas">Tazas</a>
            </li>
        </ul>
    </nav>
</body>
<br>
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
