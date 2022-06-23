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
        <section id="main7">
            <a href="management.php?>" target="_self" class="button"> Retour</a>
            
            <h1 class="nv">Supprimer Voitures</h1>
            <?php
                    if(isset($_GET["f_supvoiture"])){
                        $vid=$_GET["f_voiture"];
                        //sélection de voitures
                        $sql="SELECT * FROM tb_voitures WHERE id_voiture = '$vid'";
                        $res=mysqli_query($con,$sql);
                        while($exibe=mysqli_fetch_assoc($res)){
                            $photo=array($exibe["photo1"],$exibe["photo2"]);
                            $minis=array($exibe["mini1"],$exibe["mini2"]);
                        }


                        $sql="DELETE FROM tb_voitures WHERE id_voiture =$vid";
                        mysqli_query($con,$sql);
                        $lignes=mysqli_affected_rows($con);
                          /*if($lignes >= 1) {
                            for($i=0 ; $i<2; $i++){
                                if($photo[$i] !=""){
                                    unlink($photo[$i]);
                                    unlink($minis[$i]);
                                    }
                                }
                            }
                            echo "<p>Voiture supprimé avec succès</p>";
                        }
                        else
                        {
                            echo "<p>Erreur lors de la suppression du voiture</p>";
                        }*/
                    }
             ?>

                <form name="f_supprimer_voiture" action="sup_voitures.php" class="f_vendeur" id="f_login" method="get">   
                <label >Sélectionner une voiture </label>
                <select name="f_voiture" size="10">
                    <option value="id_vendeurs"></option>
                    <?php
                        $sql="SELECT tb_voitures.*,tb_marques.*,tb_modele.* FROM tb_voitures INNER JOIN tb_marques ON tb_voitures.id_marque= tb_marques.id_marque INNER JOIN tb_modele ON tb_voitures.id_modeles = tb_modele.id_modeles ";
                        $vend=mysqli_query($con,$sql);
                        while($exibe=mysqli_fetch_array($vend)){
                            echo "<option value='".$exibe['id_voiture']."'>".$exibe['marque']." - ".$exibe['modele']." - ".$exibe['vers']." - ".$exibe['mise_circulation']." - ".$exibe['prix']."</option>";
                        }
                    
                    ?>
                </select>
                <input type="submit" value="supprimer" name="f_supvoiture">
            </form>      
        </section>

    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>