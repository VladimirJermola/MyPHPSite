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
// Kas ids on ja kas on number
if(isset($_GET['ids']) && is_numeric($_GET['ids'])) {
    $id = $_GET['ids'];
    //echo $id;

    if(is_numeric($id)) {
        //$sql = 'SELECT * FROM simple WHERE id = '.$id;
        $pdo = new PDO($dsn, $user, $pass, $options);
        $data = ['id' => $id];

        $sql = 'SELECT * FROM blog WHERE id = :id';
        //echo $sql;
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        
        $blogs = $statement->fetchAll(PDO::FETCH_ASSOC);
        /*
        if ($blogs) {
            // show the publishers
            foreach ($blogs as $blog) {
                echo $blog['name'] . '<br>';
                echo $blog['text'] . '<br>';
                echo $blog['picture'] . '<br>';
            }
        }
        //$database->show($res); //Test
        */
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Update - Muuda tabeli kirjet</h3>

            <form action="update.php" method="post">
                <div class="row mb-2">
                    <label for="name" class="col-sm-2 form-label mt-1 fw-bold">Nimi</label>
                    <div class="col">
                        <input type="text" name="name" value="<?php if(isset($blogs[0]['name'])) {echo $blogs[0]['name'];} ?>" id="name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="text" class="col-sm-2 form-label mt-1 fw-bold">Text</label>
                    <div class="col">
                        <!--
                        <textarea name="text" value="<?php if(isset($blogs[0]['text'])) {echo $blogs[0]['text'];} ?>" class="form-control"  rows="3" required></textarea>
                        -->
                        <input type="text" name="text" value="<?php if(isset($blogs[0]['text'])) {echo $blogs[0]['text'];} ?>" id="text" class="form-control" required>
                        
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="picture" class="col-sm-2 form-label mt-1 fw-bold">Picture</label>
                    <div class="col">
                        <input type="text" name="picture" value="<?php if(isset($blogs[0]['picture'])) {echo $blogs[0]['picture'];} ?>" id="salary" class="form-control">
                    </div>
                </div>


                <div class="row mb-2">
                    <div class="col">
                        <input type="hidden" name="sid" value="<?php if(isset($blogs[0]['id'])) {echo $blogs[0]['id'];} ?>">
                        <input type="submit" name="submit" value="Muuda andmeid" class="btn btn-warning form-control">                        
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-info form-control">Reseti vorm</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>
    <footer>
        &copy; 2024 Kaunis Eesti
    </footer>
</body>
</html>