<?php
include "gestion.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/luxe_cars.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script>
        function clique(img){
            var modF=document.getElementById("fen_img");
            var modI=document.getElementById("img_gr");
            var modB=document.getElementById("fermer");

            modF.style.display="block";
            modI.src=img;
            modB.onclick=function(){
                modF.style.display="none";
            }
        }
    </script>
    <title>Luxe Cars</title>
</head>
<body>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
    <a href="voitures.php" target="_self" class="button">Retour</a>
    <section id="detail">
    
        <?php
         $id=$_GET['id'];
         $sql="SELECT tb_voitures.*,tb_marques.*,tb_modele.* FROM tb_voitures INNER JOIN tb_marques ON tb_voitures.id_marque= tb_marques.id_marque INNER JOIN tb_modele ON tb_voitures.id_modeles = tb_modele.id_modeles WHERE tb_voitures.id_voiture = $id";
            //ici avec le "LIMIT" contrôlez le nombre de voitures à afficher et lesquelles à travers les valeurs(variables) qui sont après la "Limit"
            $res=mysqli_query($con,$sql);
          
            //Pour ouvrir fenetre
            $exibe=mysqli_fetch_array($res);
             echo 
                    "<div id='dvminis'>".
                    "<img src='".$exibe['mini1']."' class='mini' onclick ='clique(\"".$exibe['photo1']."\")'>".
                    "<img src='".$exibe['mini2']."' class='mini' 
                    onclick ='clique(\"".$exibe['photo2']."\")'>".
                "</div>".
                "<div id='dvdet'>". 
                        "<div ='dvc1'".  
                            "id=".$exibe['id_voiture']."<br>".
                            "Marque: ".$exibe['marque']."<br>".
                            "Modele: ".$exibe['modele']."<br>".
                            "Version: ".$exibe['vers']."<br>".
                    "</div>".
                    "<div id='dvc2'>".
                        "Prix: <span class='prix'>€  ".number_format($exibe['prix'],2,',','.')."</span><br>".
                        "Année: ".$exibe['mise_circulation']."<br>".
                            "Disponible: ";
                                if($exibe['vendu'] == '0'){
                                    echo "Non";
                                }else{
                                    echo "Oui";
                                }
                                    echo "<br>".
                    "</div>".            
                "</div>".          
                   " <div id='fen_img'>".
                    "<span id='fermer'>X</span>".
                    "<img id='img_gr'>".
                "</div>";
         
       
        ?> 
      
      
    </section>    
    

    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>