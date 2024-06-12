<?php 
    session_start();
    include "connect.php"; 
    define('UPLPATH', 'images/'); 
    $admin = false;
    $uspjesnaPrijava = false;

    if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
        $uspjesnaPrijava = true;
        if ($_SESSION['level'] == 1) { 
            $admin = true; 
        }
        else { 
            $admin = false; 
        } 
    }
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
                    <li class="nav-item"><a href="administracija.php" class="nav-link" id="linkactive">ADMINISTRACIJA</a></li>
                    <li class="nav-item"><a href="prijava.php" class="nav-link">PRIJAVA</a></li>
                    <li class="nav-item"><a href="registracija.php" class="nav-link">REGISTRACIJA</a></li>
                </ul>
            </nav>
        </div>
        <main class="container">
            <h1>Unos/brisanje članka</h1>
            <div class="page-wrapper">
            <?php 
                if (($uspjesnaPrijava && $admin) || (isset($_SESSION['username']) && $_SESSION['level'] == 1)) {
                    $query = "SELECT * FROM vijesti"; 
                    $result = mysqli_query($dbc, $query); 
                    while($row = mysqli_fetch_array($result)){
                        echo '<form enctype="multipart/form-data" action="" method="POST">
                        <div class="form-item">
                            <label for="title">Naslov vijesti</label>
                            <div class="form-field">
                            <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="about">Kratki sažetak vijesti (do 50 znakova)</label> 
                            <div class="form-field">
                            <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="content">Sadržaj vijesti</label>
                            <div class="form-field">
                            <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['sadrzaj'].'</textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="pphoto">Slika: </label>
                            <div class="form-field">
                            <input type="file" accept="image/jpg,image/jpeg,image/png" class="input-text" name="pphoto"/><br>
                            <img src="' . UPLPATH . $row['slika'] . '" width=100px>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="category">Kategorija vijesti</label>
                            <div class="form-field">
                            <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                <option value="slavni"'.($row['kategorija']=="slavni" ? "selected":"").'>Svijet slavnih</option>
                                <option value="ljepota" '.($row['kategorija']=="ljepota" ? "selected":"").'>Ljepota i Njega</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="form-check">
                                <label>Spremiti u arhivu?
                                    <div class="form-field">';
                                    if($row['arhiva'] == 0) {
                                        echo '<input type="checkbox" name="archive" id="archive"/>';
                                    } 
                                    else {
                                        echo '<input type="checkbox" name="archive" id="archive" checked/>';
                                    }                                       
                                    echo '</div>
                                    </label>
                            </div>
                        </div>
                        <div class="form-item">
                            <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"/>
                            <button type="submit" name="posalji" value="Prihvati">Objavi</button>
                            <button type="reset" name="ponisti" value="Poništi">Poništi</button>
                            <button type="submit" name="obrisi" value="Izbriši">Izbriši</button>
                        </div>
                    </form>';
                    }
                    if(isset($_POST['obrisi'])){
                        $id=$_POST['id'];
                        $query = "DELETE FROM vijesti WHERE id=$id";
                        $result = mysqli_query($dbc, $query);
                    }
                    if(isset($_POST['posalji'])){
                        $title=$_POST['title'];
                        $about=$_POST['about'];
                        $content=$_POST['content'];
                        $category=$_POST['category'];

                        if(isset($_POST['archive'])){
                            $archive=1;
                        }else{
                            $archive=0;
                        }
                        $id=$_POST['id']; 
                        // rješavanje problema ne spremanja slika
                        if (!empty($_FILES['pphoto']['name'])) {
                            $picture = $_FILES['pphoto']['name'];
                            $target_dir = 'images/'.$picture;
                            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                        } else {
                            $query = "SELECT slika FROM vijesti WHERE id=$id";
                            $result = mysqli_query($dbc, $query);
                            $row = mysqli_fetch_assoc($result);
                            $picture = $row['slika'];
                        }
                        $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', sadrzaj='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id";
                        $result = mysqli_query($dbc, $query);
                    }
                }
                else if ($uspjesnaPrijava == true && $admin == false) { 
                    echo '<p>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
                }
                else { 
                    echo "<p>Niste prijavljeni, to možete učiniti ovdje: <a href='prijava.php' class='login' >Prijava</a></p>";
                }
            ?>

            </div>
        </main>
        <footer>
            <img src="images/Welt_Logo.png" id="logo" alt=""><br>
            Anja Cibula, acibula@tvz.hr, 2024
        </footer>
    </body>
</html>