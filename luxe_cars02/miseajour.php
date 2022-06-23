<?php
    include "gestion.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   
    <title>Luxe Cars</title>
</head>
<body>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
        <section id="main">
            <a href="management.php?" target="_self" class="button"> Retour</a>
            
            <h1 class="nv">Modifier Voitures</h1>


            <?php
                if(isset($_GET["f_modvoiture"])){
                    $vid=$_GET["f_voiture"];
                    //sélection de voitures
                    $sql="SELECT * FROM tb_voitures WHERE id_voiture = '$vid'";
                    $res=mysqli_query($con,$sql);
                    while($exibe=mysqli_fetch_assoc($res)){
                        $photo=array($exibe["photo1"],$exibe["photo2"]);
                        $minis=array($exibe["mini1"],$exibe["mini2"]);
                    }
                    $sql="UPDATE FROM tb_voitures WHERE id_voiture =$vid";
                    mysqli_query($con,$sql);
                    $lignes=mysqli_affected_rows($con);
                    if($lignes >= 1) {
                        for($i=0 ; $i<3; $i++){
                            if($photo[$i] !=""){
                                unlink($photo[$i]);
                                unlink($minis[$i]);
                                }
                            }
                    }
                     echo "<p>Voiture mise à jour avec succès</p>";
                }
                else
                {
                    echo "<p>Erreur lors de la mise à jour du voiture</p>";
                }
            ?>
        </section>

<footer>
    <?php
        include "footer.php";
    ?> 
</footer>

</body>
</html>