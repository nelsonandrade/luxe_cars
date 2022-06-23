<?php
    session_start();
    if(isset($_SESSION["numlogin"])) {
        $n1=$_GET["num"];
        $n2=$_SESSION["numlogin"];
        if($n1 != $n2){
            echo "<p>Connexion non établie!</p>";
            exit;
        }
    }else{
        echo "<p>Connexion non établie!</p>";
        exit;
        }
    ?>