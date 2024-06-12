<?php 
    session_start();
    include "connect.php"; 
    define('UPLPATH', 'images/'); 


    if (isset($_POST['prijava'])) {
         // Provjera postoji li korisnik u bazi uz zaštitu od SQL injectiona
        $prijavaImeKorisnika = $_POST['username']; 
        $prijavaLozinkaKorisnika = $_POST['lozinka']; 
        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?"; 
        $stmt = mysqli_stmt_init($dbc); 
        if (mysqli_stmt_prepare($stmt, $sql)) { 
            mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_store_result($stmt);
        } 
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
        mysqli_stmt_fetch($stmt);
        if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
            $uspjesnaPrijava = true;
            $_SESSION['username'] = $imeKorisnika; 
            $_SESSION['level'] = $levelKorisnika;
            //preusmjeravanje korisnika na stranicu administracija
            http_response_code(302);
            header("Location: administracija.php");
            exit(); 
        }
        else { 
            $uspjesnaPrijava = false; 
        }
    }
    mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Anja Cibula">
        <meta name="description" content="Stranica za potrebe kolegija PWA'">
        <title>WELT</title>
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
                    <li class="nav-item"><a href="prijava.php" class="nav-link" id="linkactive">PRIJAVA</a></li>
                    <li class="nav-item"><a href="registracija.php" class="nav-link">REGISTRACIJA</a></li>
                </ul>
            </nav>
        </div>
        <main class="container">
            <h1>PRIJAVA</h1>
            <div class="page-wrapper-prijava">
                <form method="POST" action="">
                    <div class="form-item">
                        <label for="username">Korisničko ime: </label>
                        <div class="form-field">
                            <span id="porukaUser" class="bojaPoruke"></span>
                            <input type="text" name="username" id="username" class="form-field-textual"><br>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="lozinka">Lozinka: </label>
                        <div class="form-field">
                            <span id="porukaLoz" class="bojaPoruke"></span>
                            <input type="password" name="lozinka" id="lozinka" class="form-field-textual"><br>
                        </div>
                    </div>
                    <div class="form-item login">
                        <input type="submit" name="prijava" value="Prijava" id="slanje">
                    </div>
                </form>
                <?php
                if (isset($uspjesnaPrijava) && !$uspjesnaPrijava) {
                    echo "<p class='bojaPoruke'>Nije uneseno ispravno korisničko ime i/ili lozinka! Ako nemate račun registrirajte se na linku ispod.</p>";
                }
                ?>
                <div class="login">
                    <p>Nemate još korisnički račun? Registrirajte se!</p>
                    <a href="registracija.php">Registracija</a>
                </div>
            </div>
            <script type="text/javascript"> 
                document.getElementById("slanje").onclick = function(event) { 
                    var slanjeForme = true; 
                    var poljeKIme = document.getElementById("username"); 
                    var korisnicko_ime = document.getElementById("username").value; 
                    if (korisnicko_ime == 0) { 
                        slanjeForme = false; 
                        poljeKIme.style.border="1px dashed red"; 
                        document.getElementById("porukaUser").innerHTML="<br>Unesite korisničko ime!<br>"; 
                    } else { 
                        poljeKIme.style.border="1px solid green"; 
                        document.getElementById("porukaUser").innerHTML=""; 
                    } 
                    var poljeLoz = document.getElementById("lozinka"); 
                    var lozinka = document.getElementById("lozinka").value; 
                    if (lozinka.length == 0) { 
                        slanjeForme = false;
                        poljeLoz.style.border="1px dashed red"; 
                        document.getElementById("porukaLoz").innerHTML="<br>Unesite lozinku!<br>"; 
                    } else { 
                        poljeLoz.style.border="1px solid green"; 
                        document.getElementById("porukaLoz").innerHTML=""; 
                    } 

                    if (!slanjeForme) { 
                        event.preventDefault(); 
                    } 
                }; 
            </script>
        </main>
        <footer>
            <img src="images/Welt_Logo.png" id="logo" alt=""><br>
            Anja Cibula, acibula@tvz.hr, 2024
        </footer>
    </body>
</html>