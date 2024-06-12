<?php 
    header('Content-Type: text/html; charset=utf-8'); 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $basename = "projekt"; 

    $dbc = mysqli_connect($servername, $username, $password, $basename) 
    or die('Greška pri povezivanju na MySQL server.'. mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8"); 
    if (!$dbc) { 
        echo "Neuspješno povezivanje!"; 
    }
?>