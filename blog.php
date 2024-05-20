<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Kaunis Eesti</title>
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
        $sql = 'SELECT * FROM simple WHERE id = '.$id;
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
        ?>
        <h1 style="color: white; text-align: center; font-family: cursive;"><?php if(isset($blogs[0]['name'])) {echo $blogs[0]['name'];} ?></h1>
        <center><img src="<?php if(isset($blogs[0]['picture'])) {echo $blogs[0]['picture'];} ?>" width="800"></center>
        <br>
        <p style="color: white; text-align: center; margin-right: 40px; margin-left: 40px;">
        <?php if(isset($blogs[0]['text'])) {echo $blogs[0]['text'];} ?>
        </p>
        <?php
    }
}

?>
    <footer>
        &copy; 2024 Kaunis Eesti
    </footer>
</body>
</html>