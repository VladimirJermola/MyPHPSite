<?php require_once 'config/mysqli.php'; ?>
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Minu JavaScriptid -->
    <script src="js/my_scripts.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Kaunis Eesti</title>
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

    <div class="container text-center pb-5">
        
            <div class="row">
                <?php
                $pdo = new PDO($dsn, $user, $pass, $options);
                $blogs = $pdo->query('SELECT * FROM blog ORDER BY added DESC LIMIT 12');
                foreach($blogs as $blog)
                {
                    $dateTime = new DateTime($blog['added']);
                    $added = $dateTime->format('d.m.Y H:i:s');
                ?>
                    <div class="col-sm">
                        <div class="container">
                        <a href="blog.php?ids=<?php echo $blog['id']; ?>"><p class="text-white">
                            <div class="card" style="width: 10rem;">
                            <img src=<?php echo $blog['picture']; ?> class="card-img-top" alt="Pilt">
                                <div class="card-body bg-success p-2" style="--bs-bg-opacity: .5;">
                                    <h6 class="card-title"><?php echo $blog['name']; ?></h6>
                                    <p class="card-text" style="font-size: xx-small;"><?php echo $added; ?></p>
                                    <form action="blog.php?ids=<?php echo $blog['id']; ?>" method="post">
                                    </form>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
              <?php
                }
                ?>
            </div>
          </div>   

    <footer>
        <script>
            var currentDate = new Date();
            
            // Get the individual components of the date
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1; // Months are zero-indexed, so we add 1
            var year = currentDate.getFullYear();
            
            // Construct the formatted date string
            var formattedDate = day + '/' + month + '/' + year;
            
            // Display the formatted date
            document.write("Täna on : " + formattedDate);
        </script> <br>
        &copy; 2024 Kaunis Eesti
    </footer>
    </body>
</html>