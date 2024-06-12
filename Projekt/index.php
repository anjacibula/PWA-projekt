<?php 
    include "connect.php"; 
    define('UPLPATH', 'images/'); 
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Anja Cibula">
        <meta name="description" content="Stranica za potrebe kolegija PWA'">
        <title>Početna</title>
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
                    <li class="nav-item"><a href="index.php" class="nav-link" id="linkactive">POČETNA</a></li>
                    <li class="nav-item"><a href="kategorija.php?kategorija=slavni" class="nav-link">SVIJET SLAVNIH</a></li>
                    <li class="nav-item"><a href="kategorija.php?kategorija=ljepota" class="nav-link">LJEPOTA I NJEGA</a></li>
                    <li class="nav-item"><a href="unos.html" class="nav-link">UNOS</a></li>
                    <li class="nav-item"><a href="administracija.php" class="nav-link">ADMINISTRACIJA</a></li>
                    <li class="nav-item"><a href="prijava.php" class="nav-link">PRIJAVA</a></li>
                    <li class="nav-item"><a href="registracija.php" class="nav-link">REGISTRACIJA</a></li>
                </ul>
            </nav>
        </div>
        <main class="container">
            <section class="row">
                <h1>Svijet slavnih</h1>
                <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='slavni' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    while($row=mysqli_fetch_array($result)){
                        echo '<article class="col-md-4 col-sm-12">';
                        echo '<img src="' .UPLPATH. $row["slika"] .'">';
                        echo '<h2>';
                        echo '<a href="clanak.php?id=' . $row['id'] . '">';
                        echo $row['naslov'];
                        echo '</a></h2>';
                        echo '<p>' .$row['sazetak']. '</p>';
                        echo '<p class="datum">' .$row['datum']. '</p>';
                        echo '</article>';
                    }

                ?>
            </section>
            <section class="row">
                <h1>Ljepota i Njega</h1>
                <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='ljepota' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    while($row=mysqli_fetch_array($result)){
                        echo '<article class="col-md-4 col-sm-12">';
                        echo '<img src="' .UPLPATH. $row["slika"] .'">';
                        echo '<h2>';
                        echo '<a href="clanak.php?id=' . $row['id'] . '">';
                        echo $row['naslov'];
                        echo '</a></h2>';
                        echo '<p>' .$row['sazetak']. '</p>';
                        echo '<p class="datum">' .$row['datum']. '</p>';
                        echo '</article>';
                    }

                ?>
            </section>
        </main>
        <footer>
            <img src="images/Welt_Logo.png" id="logo" alt=""><br>
            Anja Cibula, acibula@tvz.hr, 2024
        </footer>
    </body>
</html>