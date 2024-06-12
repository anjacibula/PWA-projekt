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
                    <li class="nav-item"><a href="prijava.php" class="nav-link">PRIJAVA</a></li>
                    <li class="nav-item"><a href="registracija.php" class="nav-link" id="linkactive">REGISTRACIJA</a></li>
                </ul>
            </nav>
        </div>
        <main class="container">
            <h1>Registracija</h1>
            <div class="page-wrapper-prijava">
                <section role="main">
                    <form enctype="multipart/form-data" action="" method="POST">
                        <div class="form-item">
                            <span id="porukaIme" class="bojaPoruke"></span>
                            <label for="ime">Ime: </label>
                            <div class="form-field">
                                <input type="text" name="ime" id="ime" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaPrezime" class="bojaPoruke"></span>
                            <label for="prezime">Prezime: </label>
                            <div class="form-field">
                                <input type="text" name="prezime" id="prezime" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaUsername" class="bojaPoruke"></span>
                            <label for="username">Korisničko ime:</label>
                            <?php
                                $msg=""; 
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $ime = $_POST['ime']; 
                                    $prezime = $_POST['prezime']; 
                                    $username = $_POST['username']; 
                                    $lozinka = $_POST['pass']; 
                                    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH); 
                                    $razina = 0; 
                                    $registriranKorisnik = false;

                                    // Provjera postoji li u bazi već korisnik s tim korisničkim imenom 
                                    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?"; 
                                    $stmt = mysqli_stmt_init($dbc); 
                                    if (mysqli_stmt_prepare($stmt, $sql)) { 
                                        mysqli_stmt_bind_param($stmt, 's', $username); 
                                        mysqli_stmt_execute($stmt); 
                                        mysqli_stmt_store_result($stmt); 
                                    } 
                                    if(mysqli_stmt_num_rows($stmt) > 0){ 
                                        $msg='Korisničko ime je već zauzeto!'; 
                                    } else { 
                                        // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection 
                                        $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)"; 
                                        $stmt = mysqli_stmt_init($dbc); 
                                        if (mysqli_stmt_prepare($stmt, $sql)) { 
                                            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina); 
                                            mysqli_stmt_execute($stmt); 
                                            $registriranKorisnik = true; 
                                        } 
                                    }
                                mysqli_close($dbc);
                                }
                                echo '<br><span class="bojaPoruke">'.$msg.'</span>'; 
                            ?>
                            <div class="form-field">
                                <input type="text" name="username" id="username" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaPass" class="bojaPoruke"></span>
                            <label for="pass">Lozinka: </label>
                            <div class="form-field">
                                <input type="password" name="pass" id="pass" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <span id="porukaPassRep" class="bojaPoruke"></span>
                            <label for="passRep">Ponovite lozinku: </label>
                            <div class="form-field">
                                <input type="password" name="passRep" id="passRep" class="form-field-textual">
                            </div>
                        </div>
                        <div class="form-item">
                            <button type="submit" value="Registracija" id="slanje">Registracija</button>
                        </div>
                    </form>
                    <?php
                        if(isset($registriranKorisnik) && $registriranKorisnik == true) { 
                        echo '<p>Korisnik je uspješno registriran!</p>';
                        }
                    ?>
                    <div class="login">
                        <p>Imate već korisnički račun? Prijavite se!</p>
                        <a href="prijava.php">Prijava</a>
                    </div>
                </section>
            </div>
            <script type="text/javascript"> 
                document.getElementById("slanje").onclick = function(event) { 
                    var slanjeForme = true; 
                    //ime mora biti uneseno
                    var poljeIme = document.getElementById("ime"); 
                    var ime = document.getElementById("ime").value; 
                    if (ime.length == 0) { 
                        slanjeForme = false; 
                        poljeIme.style.border="1px dashed red"; 
                        document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>"; 
                    } else { 
                        poljeIme.style.border="1px solid green"; 
                        document.getElementById("porukaIme").innerHTML=""; 
                    } 
                    // Prezime mora biti uneseno
                    var poljePrezime = document.getElementById("prezime"); 
                    var prezime = document.getElementById("prezime").value; 
                    if (prezime.length == 0) { 
                        slanjeForme = false;
                        poljePrezime.style.border="1px dashed red"; 
                        document.getElementById("porukaPrezime").innerHTML="<br>Unesite prezime!<br>"; 
                    } else { 
                        poljePrezime.style.border="1px solid green"; 
                        document.getElementById("porukaPrezime").innerHTML=""; 
                    } 
                    // Korisničko ime mora biti uneseno
                    var poljeUsername = document.getElementById("username"); 
                    var username = document.getElementById("username").value;
                    if (username.length == 0) { 
                        slanjeForme = false; 
                        poljeUsername.style.border="1px dashed red"; 
                        document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>"; 
                    } else { 
                        poljeUsername.style.border="1px solid green"; 
                        document.getElementById("porukaUsername").innerHTML=""; 
                    } 
                    //Provjera podudaranja lozinki
                    var poljePass = document.getElementById("pass"); 
                    var pass = document.getElementById("pass").value; 
                    var poljePassRep = document.getElementById("passRep"); 
                    var passRep = document.getElementById("passRep").value; 
                    if (pass.length == 0 || passRep.length == 0 || pass != passRep) { 
                        slanjeForme = false; 
                        poljePass.style.border="1px dashed red"; 
                        poljePassRep.style.border="1px dashed red"; 
                        document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu jednake!<br>"; 
                        document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu jednake!<br>"; 
                    } else { 
                        poljePass.style.border="1px solid green"; 
                        poljePassRep.style.border="1px solid green"; 
                        document.getElementById("porukaPass").innerHTML=""; 
                        document.getElementById("porukaPassRep").innerHTML=""; 
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