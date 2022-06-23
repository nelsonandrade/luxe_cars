
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
    <title>Nouvelle Voiture</title>
    <link rel="shortcut icon" href="img/luxe_cars.ico" type="image/x-icon">
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('select[name="f_voiture"]').on('change',function(){
               var vm=this.value;
                $('select[name="f_modele"] option').each(function(){
                    var $this=$ (this);
                    if($this.data('marques') == vm) {
                        $this.show();
                    }else{
                        $this.hide();
                    }
                });
            });
            $('select[name="f_modele"]').val('');
        });
    </script>


</head>
<body>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
        <section id="nouvelle_voiture">
                    <a href="management.php" target="_self" class="button"> Retour</a>
                    
                    <h1>Nouvelle Voiture</h1>
        <?php
                    //options de voiture
            $vetOpc=array();
            $vetOpc[0]="Jantes Magnésium";
            $vetOpc[1]="Carbone";
            $vetOpc[2]="Freins carbone céramique";
            $vetOpc[3]="Feux laser";
            $vetOpc[4]="Suspension Réglable et Sportive";
                
                
                    //rajoutez les photos
             if(isset($_POST["f_bt_nvoiture"])){
                    $vetPhotos=array();
                    $vetMinis=array();
                    $ip=0;
                    $qtdephotos=2;
                    //pointer vers le répertoire des photos
                    $dir='voitures/';

                for($ip=0 ;$ip<$qtdephotos; $ip++){
                        $vetPhotos[$ip]="";
                        $vetMinis[$ip]="";//commencer les vecteurs
                    

                    for($ip=0 ;$ip<$qtdephotos; $ip++){
                        
                    if($_FILES['f_photo'.($ip+1)]['name']!=""){
                            $ex = strtolower(substr($_FILES['f_photo'.($ip+1)]['name'],-4));//Je récupère les 4 derniers chiffres du fichier, c'est pourquoi j'ai utilisé le -4
                            $nouveau_nom=uniqid().$ex;//J'ai généré un nouveau nom de fichier afin qu'il n'y ait pas de fichiers portant le même nom et qu'il puisse être remplacé dans la base de données, une fois enregistré
                            move_uploaded_file($_FILES['f_photo'.($ip+1)]['tmp_name'], 
                            $dir . $nouveau_nom);
                            //tmp_name est le nom temporaire qu'il utilise lors du chargement
                            list($largeur,$hauteur,$type)=getimagesize ($dir.$nouveau_nom);
                            $image=imagecreatefromjpeg($dir.$nouveau_nom);
                            $thumb=imagecreatetruecolor(117,88);
                            imagecopyresampled($thumb,$image,0,0,0,0,117,88,$largeur,$hauteur);
                            imagejpeg($thumb,$dir."mini_".$nouveau_nom,75);

                            $vetPhotos[$ip]=$dir.$nouveau_nom;
                            $vetMinis[$ip]=$dir."mini_".$nouveau_nom;

                    }else{  $vetPhotos[$ip]="";
                            $vetMinis[$ip]="";    

                    }
                  
                }

            }    

                    $vetOpcSel=array();
                    for($iopcs=0;$iopcs<count($vetOpc);$iopcs++){
                        $vetOpcSel[$iopcs]="0";
                    }

                    for($iop=0;$iop<count($vetOpc);$iop++){
                        if(isset($_POST['f_opc' . ($iop+1)])){
                            $vetOpcSel[$iop]="1";
                        }
                    
                    }
                    $vid_marques=$_POST['f_voiture'];
                    $vid_modele=$_POST['f_modele'];
                    $vversion=$_POST['f_version'];
                    $vannee=$_POST['f_annee'];
                    $vkm=$_POST['f_km'];
                    $vdesc=$_POST['f_desc'];
                    $vprix=number_format((float) $_POST['f_prix'],2,'.','');
                    $vphoto1=$vetPhotos[0];
                    $vphoto2=$vetPhotos[1];
                    $vphoto3=$vetPhotos[2];
                    $vmini1=$vetMinis[0];
                    $vmini2=$vetMinis[1];
                    $vmini3=$vetMinis[2];
                    $vopc1=$vetOpcSel[0];
                    $vopc2=$vetOpcSel[1];
                    $vopc3=$vetOpcSel[2];    
                    $vvendre=0;
                    $vreserve=0;
                     
                    $sql="INSERT INTO `tb_voitures` (`id_voiture`, `id_marque`, `id_modeles`, `vers`, `mise_circulation`, `kms`, `obs`, `prix`, `photo1`, `photo2`, `photo3`, `mini1`, `mini2`, `mini3`, `opc1`, `opc2`, `opc3`, `vendu`, `reserve`)  VALUE ('$vid_marques','$vid_modele','$vversion','$vannee',$vkm,'$vdesc',$vprix,'$vphoto1','$vphoto2','$vphoto3','$vmini1','$vmini2','$vmini3','$vopc1','$vopc2','$vopc3','$vvendre','$vreserve')";
                    
                    mysqli_query($con,$sql);
                    $linhas=mysqli_affected_rows($con);
                    var_dump($linhas);
                    if($linhas >= 1){
                        echo"<p>Voiture enregistrée avec succès!</p>";
                    }else{
                        echo"<p>Erreur lors de enregistrement</p>";
                    }  
                }   
                ?>  
            <form method="post" enctype="multipart/form-data" action="nouv_voiture.php" >
                    <label>Marques</label>
                    <select name="f_voiture">
                        <option value=""></option>
                        <?php
                            $sql="SELECT * FROM  tb_marques";
                            $res=mysqli_query($con,$sql);
                            while($linha=mysqli_fetch_row($res)){
                                echo "<option value=''".$linha[0]."'>".$linha[1]."</option>"; 
                            }
                        ?>
                    </select>

                <label>Modèles</label>
                <select name="f_modele" id="">
                    <option value=""></option>
                    <?php
                        $sql="SELECT * FROM  tb_modele";
                        $res=mysqli_query($con,$sql);
                        while($linha=mysqli_fetch_row($res)){
                            echo "<option value=''".$linha[0]."'data-marques ='".$linha[2]."'>".$linha[1]."</option>";  
                        }             
                    ?>
                    </select>
                        <label>Version</label>
                        <input type="text" name="f_version" maxlength="50" size="50" required="required">
                        <label>Mise en Circulation</label>
                        <input type="text" name="f_annee" maxlength="4"  size="50" required="required">
                        <label>Kilométrage</label>
                        <input type="text" name="f_km" maxlength="50" size="50" required="required">
                        <label>Description</label>
                        <input type="text" name="f_desc" maxlength="50" size="50" required="required">
                        <label>Prix</label>
                        <input type="text" name="f_prix" maxlength="11" size="11" required="required">
                        <label>Photo1</label>
                        <input type="file" name="f_photo1">
                        <label>Photo2</label>
                        <input type="file" name="f_photo2">
                        <label>Photo3</label>
                        <input type="file" name="f_photo3">
                        <label>Vendu</label>
                        <input type="checkbox" name="f_avendre">
                        <label>Réservé</label>
                        <input type="checkbox" name="f_reserve">
                        <h2>Options</h2>
                            <div id="opc">
                                <input type="checkbox" name="f_opc1" value="1"
                                ><label><?php echo $vetOpc [0]?></label><br>
                                <input type="checkbox" name="f_opc2" value="1"
                                ><label><?php echo $vetOpc [1]?></label><br>
                                <input type="checkbox" name="f_opc3" value="1"
                                ><label><?php echo $vetOpc [2]?></label><br>
                            </div>
                        <input type="submit" name="f_bt_nvoiture" classe="button"   value="Enregistrer">
                    
            </form>      
            
        </section>
    
    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>