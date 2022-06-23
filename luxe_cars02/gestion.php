<?php
$host ="localhost";
$user ="root";
$pass ="";
$bd ="luxe_cars";

$con= new mysqli($host, $user, $pass, $bd);

/* check connection*/
if ($con->connect_errno){
    echo "Connect failed: " .$con->connect_error;
    exit();
}
?>