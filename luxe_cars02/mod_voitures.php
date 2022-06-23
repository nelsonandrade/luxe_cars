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
    <section id="main6">
            <a href="management.php" target="_self" class="button"> Retour</a>
            
            <h1 class="nv">Modifier Voiture</h1>

                
        <form name="f_mod_voiture" action="mod_voitures.php" class="f_voiture"  method="get" >   
            <label>Sélectionner une voiture </label>
            <select name="f_voitures" size="5" id="vendeur">
                <option value="id_voitures"></option>
                <?php
                   $sql="SELECT tb_voitures.*,tb_marques.*,tb_modele.* FROM tb_voitures INNER JOIN tb_marques ON tb_voitures.id_marque= tb_marques.id_marque INNER JOIN tb_modele ON tb_voitures.id_modeles = tb_modele.id_modeles ";
                   $voit=mysqli_query($con,$sql);
                   $total_voit=mysqli_num_rows($voit);
                   while($exibe=mysqli_fetch_array($voit)){
                       echo "<option value='".$exibe['id_voiture']."'>".$exibe['marque']." - ".$exibe['modele']."</option>";
                   }
                ?>
            </select>
                    <input type="submit" value="Modifier" name="f_mod_vendeur">
         </form>  
         
         <?php
              if(isset($_GET["f_voitures"])){
                  $vid=$_GET["f_voitures"];
                  $sql="SELECT * FROM tb_voitures WHERE id_voiture=$vid";
                  $voiture=mysqli_query($con,$sql);
                  $exibe=mysqli_fetch_array($voiture);
                  if($exibe >=1) {
                    echo "
                    <form name='f_modif_voiture' action='mod_voitures.php' class='f_voiture' method='get'> 
                     
                        <input type='hidden' name='id' value='".$exibe['id_voiture']."'>  
                        <input type='text' name='f_marque' placeholder='Marque' maxlength='30' required='required' value='".$exibe['id_marque']."'>
                        <input type='text' name='f_modele'  placeholder='Modéle' maxlength='20' required='required' value='".$exibe['id_modeles']."'>
                        <input type='text' name='f_version' placeholder='Version' maxlength='15' required='required' value='".$exibe['vers']."'>
                        <input type='text' name='f_annee' placeholder='Année' maxlength='4' required='required'  value='".$exibe['mise_circulation']."'>
                        <input type='text' name='f_kms' placeholder='Kilométrage' maxlength='4' required='required'  value='".$exibe['kms']."'>
                        <input type='text' name='f_obs' placeholder='Commentaires' maxlength='200' required='required'  value='".$exibe['obs']."'>
                        <input type='text' name='f_prix' placeholder='Prix' maxlength='20' required='required'  value='".$exibe['prix']."'>
                        <label>Vendu</label>
                        <input type='checkbox' name='f_vendu'   value='".$exibe['vendu']."'>
                        <label>Resérve</label>
                        <input type='checkbox' name='f_reserve'  value='".$exibe['reserve']."'>
                        
                        <input type='submit' value='Sauvegarder' name='f_update_voiture' target='self'>
                    </form>";
                  }
              }
         
          if(isset($_GET["f_update_voiture"])){
                $vid=$_GET["id"];
                $vmarque=$_GET["f_marque"];
                $vmodele=$_GET["f_modele"];
                $vversion=$_GET["f_version"];
                $vannee=$_GET["f_annee"];
                $vkms=$_GET["f_kms"];
                $vobs=$_GET["f_obs"];
                $vprix=$_GET["f_prix"];
                $vvendu=0;
                $vreserve=0;

                $sql="UPDATE tb_voitures SET id_marque='$vmarque',id_modeles='$vmodele',vers='$vversion',mise_circulation='$vannee',kms='$vkms',obs='$vobs',prix='$vprix',vendu='$vvendu',reserve='$vreserve' WHERE id_voitures=$vid";
                $res=mysqli_query($con,$sql);
                $lignes=mysqli_affected_rows($con);
                if($lignes >= 1) {
                  echo "<p>Les données de la voiture ont été mises à jour avec succès!</p>";
                  
                }
                else
                {
                    echo "<p>Erreur lors de mettre à jour de la voiture!</p>";
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