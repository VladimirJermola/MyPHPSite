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

<?php
require_once 'config/mysqli.php';
// Kas ids on olemas ja kas see on number
if(isset($_GET['ids']) && is_numeric($_GET['ids'])) {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $ids = $_GET['ids'];
    $sql = 'DELETE FROM blog WHERE id = :ids';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':ids', $ids, PDO::PARAM_INT);
    if ($statement->execute()) {
        $success = true;
        $url = $_SERVER['PHP_SELF'].'?page=delete';
        //header("Location: ".$url);
    } else {
        $success = false;
        //header('Location: index.php?page=delete');
        //echo 'id ' . $ids . ' was deleted successfully.';
    }
    //header("Location: arhiiv.php");
    /*
    if($database->dbQuery($sql)) {
        $success = true;
        $url = $_SERVER['PHP_SELF'].'?page=delete';
        header("Location: ".$url);
    } else {
        $success = false;
        header('Location: index.php?page=delete');
    }
    */
}
?>

    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Delete - Kustuta kirje tabelist</h3>
            <?php
            // Kui toimus kustutamine (faili alguses olev if lause on tõene!)
            if(isset ($success) && $success) {
                ?>
                <div class="alert alert-success">
                    Sissekanne on tabelist kustutstud.
                </div>
                <?php 
            } else if(isset($success) && !$success) {
                ?>
                <div class="alert alert-danger">
                    Sissekanne kustutamisel tekkis tõrge.
                </div>
                <?php 
            }

            // Näita tulemust
            // SQL lause, päring ja if lause kas tulemust on
            //$sql = 'SELECT * FROM simple ORDER by added DESC';
            //$res = $database->dbGetArray($sql);
            $pdo = new PDO($dsn, $user, $pass, $options);
            $blogs = $pdo->query('SELECT * FROM blog ORDER BY added DESC');
            if($blogs !== false) {
            
            ?>
            <div class="w-auto p-3">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>Jrk</th>
                            <th>Nimi</th>
                            <th>Lisatud</th>
                            <th>Tegevus</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php
                        // foreach-loop algus 
                        foreach($blogs as $blog) {
                            $dateTime = new DateTime($blog['added']);
                            $added = $dateTime->format('d.m.Y H:i:s');                        
                        ?>
                            <tr>
                                <td class="text-end"><?php echo $blog['id'];  ?>.</td>
                                <td><?php echo $blog['name']; ?></td>
                                <td><?php echo $added; ?></td>
                                <td class="text-center">
                                    <a href="?page=delete&ids=<?php echo $blog['id']; ?>" onclick="if (confirm('Kas oled kindel?')) { return true; } else { return false; }">
                                        <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        // foreach-loop lõpp
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
            // if lause els osa
            } else {
            ?>
                <p class="text-danger fs-4 text-center fw-bold">Isikuid ei leitud</p>
            <?php
            // if lause lõpp
            }
            ?>
        </div>

        <div class="col-sm-2"></div>
    </div>
    <footer>
        &copy; 2024 Kaunis Eesti
    </footer>
    </body>
</html>