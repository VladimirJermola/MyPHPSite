<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Minu JavaScriptid -->
    <script src="js/my_scripts.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header style="margin-top: 25px;">
        <h1 class="text-white" style="margin-top: 35px;">Kaunis Eesti</h1>
        <nav style="margin-top: 60px;">
          <ul>
            <li ><a href="index.php"><p class="text-white">Esileht</p></a></li>
            <li><a href="minust.html"><p class="text-white">Minust</p></a></li>
            <li><a href="kontakt.html"><p class="text-white">Kontakt</p></a></li>
            <li><a href="kommentaarid.html"><p class="text-white">Kommentaarid</p></a></li>
            <li><a href="arhiiv.php"><p class="text-white">Arhiiv</p></a></li>
          </ul>
        </nav>
    </header>
    <br>
<h2 class="text-center">Arhiiv</h2>
<div class="container">
        <div class="row">
            <div class="col text-center">
                <?php require_once 'menu.php'; ?>
            </div>
        </div>
    </div>
<?php
require_once 'config/mysqli.php';
// Lisame siia leheküljendamise
//include 'hw_paginate.php';
// sql lause, päring ja if lause
//$sql = 'SELECT * FROM simple ORDER BY added DESC LIMIT '.$start.', '.$maxPerPage;
//$res = $database->dbGetArray($sql);
$pdo = new PDO($dsn, $user, $pass, $options);
$blogs = $pdo->query('SELECT * FROM blog ORDER BY added DESC');
if($blogs !== false) {
?>
<div class="w-auto p-3">
    <table class="table table-hover table-bordered px-2 w-auto">
        <thead>
            <tr class="text-center">
                <th>Jrk</th>
                <th>Nimi</th>
                <th>Text</th>
                <th>Pilt</th>
                <th>Lisatud</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($blogs as $blog) {
                //$date = new DateTime($val['birth']);
                //$birth = $date->format('d.m.Y');
                $dateTime = new DateTime($blog['added']);
                $added = $dateTime->format('d.m.Y H:i:s');
            ?>

            <tr>
                <td class="text-end"><?php echo $blog['id']; ?>.</td>
                <td><?php echo $blog['name']; ?></td>
                <td><?php echo $blog['text']; ?></td>
                <td><?php echo wordwrap($blog['picture'],75,'<br />', true); ?></td>
                <td><?php echo $added; ?></td>         
            </tr>
            <?php 
            }
            ?>
</div>
        </tbody>
    </table>
<?php
} else {
?>

<div class="alert alert-danger">Sobivaid kirjeid ei leitud</div>
<?php
}
?>
    <footer>
        &copy; 2024 Kaunis Eesti
    </footer>
</body>
</html>
