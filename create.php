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
// Kas submit nuppu on vajutatud
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sisu = $_POST['text'];
    $picture = $_POST['picture'];
    
    $sql = 'INSERT INTO blog (name, text, picture, added) VALUES (:name,:text, :picture, NOW())';
    $statement = $pdo->prepare($sql);
    $statement->execute([
	':name' => $name,
    ':text' => $sisu,
    ':picture' => $picture
    ]);
    
    header("Location: index.php");
}

?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <h2 class="text-center">Create - Tee uus sissekanne</h2>
        <!--
        <?php
        // Siia tuleb kas roheline või punane teavitus kast lisamise kohta
        if(isset ($success) && $success) {
            ?>
            <div class="alert alert-success">
                Sissekanne on tehtud tabelisse
            </div>
            <?php 
        } else if(isset($success) && !$success) {
            ?>
            <div class="alert alert-danger">
                Sissekanne tegemisel tekkis tõrge
            </div>
            <?php 
        }
        
        ?>
        -->
        <form action="#" method="post">
            <div class="row mb-2">
                <label for="name" class="col-sm-2 form-label mt-1 fw-bold">Name</label>
                <div class="col">
                    <input type="text" name="name" value="" id="name" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
            <label for="text" class="col-sm-2 form-label mt-1 fw-bold">Text</label>
                <div class="col">
                    <!--
                    <textarea name="text" value="" id="text" class="form-control"  rows="3" required></textarea>
    -->
                    <input type="text" name="text" value="" id="text" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="picture" class="col-sm-2 form-label mt-1 fw-bold">Link to picture</label>
                <div class="col">
                    <input type="text" name="picture" value="" id="picture" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="submit" name="submit" value="Lisa blogi" class="btn btn-success form-control">
                </div>
                <div class="col">
                    <button type="reset" class="btn btn-warning form-control">Reseti vorm</button>
                </div>

            </div>
        </form>
    </div>
</div>
    <footer>
        &copy; 2024 Kaunis Eesti
    </footer>
</body>
</html>