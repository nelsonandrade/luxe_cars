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
    <section id="main4">
            <a href="management.php" target="_self" class="button"> Retour</a>
            
            <h1 class="nv">Modifier Vendeur</h1>

                
        <form name="f_mod_vendeur" action="mod_vendeur.php" class="f_vendeur"  method="get" >   
            <label>Sélectionner le vendeur </label>
            <select name="f_vendeur" size="5" id="vendeur">
                <option value="id_vendeurs">NOM_VENDEUR</option>
                <?php
                    $sql="SELECT * FROM tb_vendeurs";
                    $vend=mysqli_query($con,$sql);
                    while($exibe=mysqli_fetch_array($vend)){
                        echo "<option value='".$exibe['id_vendeurs']."'>".$exibe['nom']."</option>";
                    }
                ?>
            </select>
                    <input type="submit" value="Modifier" name="f_mod_vendeur">
         </form>  
         
         <?php
              if(isset($_GET["f_vendeur"])){
                  $vid=$_GET["f_vendeur"];
                  $sql="SELECT * FROM tb_vendeurs WHERE id_vendeurs=$vid";
                  $vend=mysqli_query($con,$sql);
                  $exibe=mysqli_fetch_array($vend);
                  if($exibe >=1) {
                    echo "
                    <form name='f_mod_vendeur' action='mod_vendeur.php' class='f_vendeur' id='f_login' method='get'> 
                     
                        <input type='hidden' name='id' value='".$exibe['id_vendeurs']."'>  
                        <input type='text' name='f_nom' placeholder='Nom du vendeur' maxlength='30' required='required' value='".$exibe['nom']."'>
                        <input type='text' name='f_user'  placeholder='Utilisateur' maxlength='20' required='required' value='".$exibe['usernom']."'>
                        <input type='text' name='f_motpasse' placeholder='Mot passe' maxlength='15' required='required' value='".$exibe['mot_pass']."'>
                        <input type='text' name='f_acess' placeholder='0-1' maxlength='50' required='required'  value='".$exibe['acces']."' pattern='[0-1]+$'>
                        <input type='submit' value='Sauvegarder' name='f_update_vendeur' target='self'>
                    </form>";
                  }
              }
         
          if(isset($_GET["f_update_vendeur"])){
                $vid=$_GET["id"];
                $vnom=$_GET["f_nom"];
                $vuser=$_GET["f_user"];
                $vmpass=$_GET["f_motpasse"];
                $vacess=$_GET["f_acess"];

                $sql="UPDATE tb_vendeurs SET nom='$vnom', usernom='$vuser', mot_pass='$vmpass', acces='$vacess' WHERE id_vendeurs=$vid";
                $res=mysqli_query($con,$sql);
                $lignes=mysqli_affected_rows($con);
                if($lignes >= 1) {
                  echo "<p>Les données du vendeur ont été mises à jour avec succès!</p>";
                  
                }
                else
                {
                    echo "<p>Erreur lors de mettre à jour du vendeur!</p>";
                }
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