<?php 
    include "connect.php"; 
    define('UPLPATH', 'images/'); 

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($dbc, $_GET['id']);
    } 
    else {
        die("Ovaj članak je nedostupan.");
    }

    $query = "SELECT * FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query); 
    $row = mysqli_fetch_assoc($result);

    function vrstaKategorije($kategorija){
        if($kategorija=="slavni"){
            return "Svijet slavnih";
        }
        elseif($kategorija=="ljepota"){
            return "Ljepota i Njega";
        }
    }
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Anja Cibula">
        <meta name="description" content="Stranica za potrebe kolegija PWA'">
        <title>Ljepota i Njega</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.png">
        <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>
    <body class="container mx-auto">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <img src="images/Welt_Logo.png" id="logo" alt="">
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid">
            <nav class="row navbar navbar-expand-lg">
                <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">POČETNA</a></li>
                    <li class="nav-item"><a href="kategorija.php?kategorija=slavni" class="nav-link">SVIJET SLAVNIH</a></li>
                    <li class="nav-item"><a href="kategorija.php?kategorija=ljepota" class="nav-link">LJEPOTA I NJEGA</a></li>
                    <li class="nav-item"><a href="unos.html" class="nav-link">UNOS</a></li>
                    <li class="nav-item"><a href="administracija.php" class="nav-link">ADMINISTRACIJA</a></li>
                    <li class="nav-item"><a href="prijava.php" class="nav-link">PRIJAVA</a></li>
                    <li class="nav-item"><a href="registracija.php" class="nav-link">REGISTRACIJA</a></li>
                </ul>
            </nav>
        </div>
        <main class="container mx-auto clanak">
            <section role="main">
                <h1><?php echo vrstaKategorije($row['kategorija']); ?></h1>
                <div class="page-wrapper">
                    <section class="article-container">
                        <h2><?php echo $row['naslov']; ?></h2>
                        <p class="datum">Objavljeno: <?php echo $row['datum']; ?></p>
                    </section>
                    <section class="image-container">
                        <?php echo '<img src="' . UPLPATH . $row['slika'] . '">'; ?>
                    </section>
                    <section class="article-container">
                        <p> <?php echo "<i>".$row['sazetak']."</i>";?> </p>
                    </section>
                    <section class="article-container">
                        <p>     
                        <?php
                            echo $row['sadrzaj'];?>
                        </p>
                    </section>
                </div>
            </section>
        </main>
        <footer>
            <img src="images/Welt_Logo.png" id="logo" alt=""><br>
            Anja Cibula, acibula@tvz.hr, 2024
        </footer>
    </body>
</html>