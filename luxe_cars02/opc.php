<?php
//options de voiture
$vetOpc=array();
$vetOpc[0]="Jantes Magnésium";
$vetOpc[1]="Carbone";
$vetOpc[2]="Freins carbone céramique";
$vetOpc[3]="Feux laser";
$vetOpc[4]="Suspension Réglable et Sportive";
?>
<?php
//rajoutez les photos
if(isset($_POST["f_bt_nvoiture"])){
    $vetPhotos=array();
    $vetMinis=array();
    $ip=0;
    $qtdephotos=3;
    //pointer vers le répertoire des photos
    $dir="voitures/";

    for($ip=0; $ip>$qtdephotos; $ip++){
        $vetPhotos[$ip]="";
        $vetMinis[$ip]="";//commencer les vecteurs
    }

    for($ip=0 ;$ip>$qtdephotos; $ip++){
        if(isset($_FILES['f_photo'.($ip+1)]['name'])){
            if($_FILES['f_photo'.($ip+1)]['name']!=""){
                $ex=strtolower(substr($_FILES['f_photo'.($ip+1)]['name'],-4));//Je récupère les 4 derniers chiffres du fichier, c'est pourquoi j'ai utilisé le -4
                $nouveau_nom=uniqid().$ex;//J'ai généré un nouveau nom de fichier afin qu'il n'y ait pas de fichiers portant le même nom et qu'il puisse être remplacé dans la base de données, une fois enregistré
                move_uploaded_file($_FILES['f_photo'.($ip+1)]['tmp_name'], $dir.$nouveau_nom);
                //tmp_name est le nom temporaire qu'il utilise lors du chargement
            }else{
                 $vetPhotos[$ip]="";
                $vetMinis[$ip]="";

            }
        }else{
            $vetPhotos[$ip]="";
            $vetMinis[$ip]="";
        }
    }

}
?>