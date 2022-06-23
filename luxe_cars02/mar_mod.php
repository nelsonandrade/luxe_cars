

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/luxe_cars.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Luxe Cars</title>
    <!-- Script pour bouton -->
    <script>
        function add(){
            document.getElementById("voitures_add").style.display="block";
            document.getElementById("voitures_del").style.display="none";
        }

        function del(){
            document.getElementById("voitures_add").style.display="none";
            document.getElementById("voitures_del").style.display="block";
        }
    </script>
</head>
<body>
   
<?php   
    include "gestion.php";

?>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
    <section id="titles">
    <a href="management.php" target="_self" class="button"> Retour</a>
            <h1 class="voitures">Marques et Modèles</h1>
    <button class="button" onclick="add()">Enregistrer</button>
    <button class="button" onclick="del()">Effacer</button>
    </section>
   <!-- section d'enregistrement des voitures-->
    <section id="voitures_add">
        <?php
            if(isset($_GET ["codigo"])){
                $vcod=$_GET["codigo"];
                if($vcod == 1){
                    $vmarque=$_GET["f_marques"];
                    $sql="INSERT INTO tb_marques (marque) VALUES ('$vmarque')";
                    mysqli_query($con,$sql);
                    $lignes=mysqli_affected_rows($con);
                    if ($lignes >=1) {
                        echo "<script>alert('Ajouté avec succès');</script>";
                    }else{
                        echo "<script>alert('Erreur ');</script>";
                    }
                }else if($vcod == 2){
                    $vmodele=$_GET["f_modele"];
                    $vidmarque=$_GET["f_marques"];
                    $sql="INSERT INTO tb_modele (modele,id_marque) VALUES ('$vmodele',$vidmarque)";
                    mysqli_query($con,$sql);
                    $lignes=mysqli_affected_rows($con);
                    if ($lignes >=1) {
                        echo "<script>alert('Ajouté avec succès');</script>";
                    }else{
                        echo "<script>alert('Erreur ');</script>";
                    }
                    //pour effacer voitures et modèles
                }else if($vcod == 3){
                        $vidmarque=$_GET["f_del_marques"];
                        $sql="DELETE FROM tb_marques WHERE id_marque=$vidmarque";
                        mysqli_query($con,$sql);
                        $lignes=mysqli_affected_rows($con);
                        if ($lignes >=1) {
                            echo "<script>alert('Effacer avec succès');</script>";
                        }else{
                            echo "<script>alert('Erreur ');</script>";
                        }
                }else if($vcod == 4){
                $vidmodele=$_GET["f_del_modele"];
                $sql="DELETE FROM tb_modele WHERE  id_modele=$vidmodele";
                mysqli_query($con,$sql);
                $lignes=mysqli_affected_rows($con);
                if ($lignes >=1) {
                    echo "<script>alert('Effacer avec succès');</script>";
                }else{
                    echo "<script>alert('Erreur ');</script>";
                }
            }
        }
            
            ?>

         <div id="f_add">

                <form action="mar_mod.php" method="get" id="f_login" name="f_nouv_marques">
                    <input type="hidden" name="codigo" value="1">
                    <label for="">Marque</label>
                    <input type="text" name="f_marques" maxlength="20" size="20" required="required">
                    <input type="submit" value="Enregistrer" class="" name="f_bt_marque">
                </form> 
                
                <form action="mar_mod.php" method="get" id="f_login" name="f_modele">
                    <input type="hidden" name="codigo" value="2">
                    <label for="">Sélectionner une marque</label>
                    <select name="f_marques" size="4" required="required">
                        <?php
                            $sql="SELECT *FROM tb_marques";
                            $col=mysqli_query($con,$sql);
                            while($exibe=mysqli_fetch_array($col)){
                                echo "<option value='".$exibe['id_marque']."'>".$exibe['marque']."</option>";
                            }
                        ?>
                    <label>Modèle</label>            
                    <input type="text" name="f_modele" maxlength="20" size="20" required="required">
                    <input type="submit" value="Enregistrer" class="" name="f_bt_modele">
                </form>  
         </div>
    </section>

<!--section pour effacer des voitures-->
<section id="voitures_del">
         <div id="f_del">
         <form action="mar_mod.php" method="get"  name="f_del_marque" id="f_login">
                    <input type="hidden" name="codigo" value="3">
                    <label for="">Sélectionner une marque</label>
                    <select name="f_del_marques" size="4" required="required" class
                    ="mar_mod">
                            <?php
                                $sql="SELECT *FROM tb_marques";
                                $col=mysqli_query($con,$sql);
                                while($exibe=mysqli_fetch_array($col)){
                                    echo "<option value='".$exibe['id_marque']."'>".$exibe['marque']."</option>";

                                }
                            ?>
                    </select>
                    <input type="submit" value="Effacer" class="" name="f_bt_del_marque">
                </form> 

                <form action="mar_mod.php" method="get" id="f_login" name="f_del_modele">
                    <input type="hidden" name="codigo" value="4">
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
                    <input type="submit" value="Effacer" class="" name="f_bt_del_modele">
                </form> 
         </div>


    </section>   
    <?php
    //pour continuer sur la même page et le formulaire est visible
         if(isset($_GET ["codigo"])){
            if(($vcod==1) or ($vcod==2)){
                echo "<script> document.getElementById('voitures_add').style.display='block';</script>";
            } else if(($vcod==3) or ($vcod==4)) {
                echo "<script> document.getElementById('voitures_del').style.display='block';</script>";
            }
        }
    ?>     

    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>