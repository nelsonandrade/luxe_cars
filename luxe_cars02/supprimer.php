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
            <section id="main5">
            <a href="management.php" target="_self" > Retour</a>
            
            <h1 class="nv">Supprimer Vendeur</h1>
            <?php
                    if(isset($_GET["f_supvendeur"])){
                        $vid=$_GET["f_vendeur"];
                        $sql="DELETE FROM tb_vendeurs WHERE id_vendeurs=$vid";
                        mysqli_query($con,$sql);
                        $lignes=mysqli_affected_rows($con);
                        if($lignes >= 1) {
                            echo "<p>Vendeur supprimé avec succès</p>";
                        }
                        else
                        {
                            echo "<p>Erreur lors de la suppression du vendeur</p>";
                        }
                    }
            
            
            ?>

            <form name="f_supprimer_vendeur" action="supprimer.php" class="f_vendeur"  method="get">   
            <label >Sélectionner le vendeur </label>
            <select name="f_vendeur" size="10" id="vendeur">
                <option value="id_vendeurs">NOM_VENDEUR</option>
                <?php
                    $sql="SELECT * FROM tb_vendeurs";
                    $vend=mysqli_query($con,$sql);
                    //$total_vend=mysqli_num_rows($vend);
                    while($exibe=mysqli_fetch_array($vend)){
                        echo "<option value='".$exibe['id_vendeurs']."'>".$exibe['nom']."</option>";
                    }
                
                ?>
            </select>
            <input type="submit" value="supprimer" name="f_supvendeur" id="input">
        </form>      
        
    </section>
    
    

    
   

    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>