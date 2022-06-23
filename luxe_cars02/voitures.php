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
    <title>Luxe Cars</title>
</head>
<body>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
    <a   href="index.php" target="_self" class="button">Retour</a>
    <section id="main1">
    
      <?php
        //connecter et récupération de données dans la base de données
            $max_voitures=3;
            if(isset($_GET["pg"])){
                $page_debut=$_GET["pg"];
            }else{
                $page_debut=1;
            }
            $debut=$page_debut - 1;
            $debut*=$max_voitures;

            $debut=$page_debut-1;
            $sql="SELECT tb_voitures.*,tb_marques.*,tb_modele.* FROM tb_voitures INNER JOIN tb_marques ON tb_voitures.id_marque= tb_marques.id_marque INNER JOIN tb_modele ON tb_voitures.id_modeles = tb_modele.id_modeles LIMIT $debut, $max_voitures";
            //ici avec le "LIMIT" contrôlez le nombre de voitures à afficher et lesquelles à travers les valeurs(variables) qui sont après la "Limit"
            $res=mysqli_query($con,$sql);
            $total_enreg=mysqli_num_rows(mysqli_query($con,"SELECT *FROM tb_voitures"));
            $total_pages=$total_enreg/$max_voitures;

            $avant=$page_debut-1;
            $apres=$page_debut+1;

          if($page_debut>1) {   
            echo"<a class='button' href='voitures.php?pg=$avant'>Avant</a>";
          }
          if($page_debut<$total_pages){
            echo"<a class='button' href='voitures.php?pg=$apres'>Après</a>";
          }
            echo"<br>";
           
          //pour afficher les numéros de page
          for($ipg=0; $ipg<$total_pages; $ipg++){
                echo "<a href='voitures.php?pg=".($ipg+1)."'>[ ";
          
              if($page_debut == ($ipg+1)) {
                echo"<strong>".($ipg+1)."</strong>";
              }else{
                  echo($ipg+1);
                
              }
              echo" ]</a>"; 
            }
          echo"<br>";
          echo"<br>";

        while($exibe=mysqli_fetch_array($res)) {
            echo 
                "<div id='d2'>".
                        "<div id='d1'>".
                            "<a href='detail_mod.php?id=".$exibe['id_voiture']."&pg=$page_debut'><img src='".$exibe['mini1']."'></a>".
                        "</div>".
                            "<div id='tit'>".
                                "<div id='t1'>".
                                  "<a href='detail_mod.php?id=".$exibe['id_voiture']."&pg=$page_debut'>"
                                  .$exibe['marque']."&nbsp;"
                                  .$exibe['modele']."&nbsp;"
                                  .$exibe['vers']."</a>".
                                "</div>".
                              "<div id='t2'>".
                                "<p> €".number_format($exibe['prix'],2,',','.')."</p>".
                              "</div>".
                          "</div>".
                      "</div>".    
                            "<div id='donnes'>".
                                "<p> ".$exibe['mise_circulation']."</p>".
                                "<p>Disponible: ";
                                if($exibe['vendu'] == '0'){
                                  echo "Non";
                                }else{
                                  echo "Oui";
                                }
                                echo "</p>";
                            "</div>";
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