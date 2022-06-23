
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/luxe_cars.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
   
    <title>Management</title>
</head>
<body>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
            <section id="main4">
            <a href="management.php" target="_self" class="button"> Retour</a>
            <?php
                include "gestion.php";
            ?>
            <h1 class="nv">Nouveau Vendeur</h1>
            <?php
                if(isset($_GET["f_neucolb"])){
                    $vnom=$_GET["f_nom"];
                    $vuser=$_GET["f_user"];
                    $vmotp=$_GET["f_motpasse"];
                    $vacess=$_GET["f_acess"];
                   
                    
                    $sql="INSERT INTO tb_vendeurs (nom, usernom, mot_pass, acces) VALUES ('$vnom','$vuser','$vmotp','$vacess')";
                    mysqli_query($con,$sql);
                    $lignes= mysqli_affected_rows($con);
                    if($lignes>=1) {
                        echo "<p>Nouveau Vendeur ajouté avec sucess! </p>";
                    }else{
                        echo "<p>Erreur d'ajout de nouveau vendeur! </p>";
                    }
                }
            ?>
  
            <form name="f_nouveau_vendeur" action="nouveau_vendeurs.php" class="f_vendeur" id="f_login" method="get">   
             <input type="text" name="f_nom" placeholder="Nom du vendeur" maxlength="30" required="required">
            <input type="text" name="f_user"  placeholder="Utilisateur" maxlength="20" required="required">
            <input type="password" name="f_motpasse" placeholder="Mot passe" maxlength="15" required="required">
            <input type="text" name="f_acess" placeholder="0-1" maxlength="50" required="required" pattern="[0-1]+$">
            <input type="submit" value="Créer Compte" name="f_neucolb">
        </form>      
        
    </section>
    
    

    
   

    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>