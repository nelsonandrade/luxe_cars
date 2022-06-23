<?php   
    include "gestion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <section id="main8">
            <h1 class="bienvenue">Trouvez votre voiture</h1>           
                <div>
                <form action="voitures.php" method="get"  name="f_del_marque" >
                    <label for="">Sélectionner une marque</label>
                        <select name="f_del_marques" size="4" required="required" class="mar_mod">
                            <?php
                                $sql="SELECT *FROM tb_marques";
                                $col=mysqli_query($con,$sql);
                                while($exibe=mysqli_fetch_array($col)){
                                    echo "<option value='".$exibe['id_marque']."'>".$exibe['marque']."</option>";
                                }
                            ?>
                        </select>
                    <form action="voitures.php" method="get"  name="f_del_modele">
                        <label for="">Sélectionner un Modèle</label>
                            <select name="f_del_modele" size="4" required="required">
                                <?php
                                    $sql="SELECT *FROM tb_modele";
                                    $col=mysqli_query($con,$sql);
                                    while($exibe=mysqli_fetch_array($col)){
                                        echo "<option value='".$exibe['id_modele']."'>".$exibe['modele']."</option>";
                                    }
                                ?>
                            </select>
                    </form> 
                        <div>
                            <br>
                        </div> 
                            <div id="chois">
                            <a  href="voitures.php" target="_self" >Choisir</a>  
                        </div>              
        </<section>
    </body>
</html>           