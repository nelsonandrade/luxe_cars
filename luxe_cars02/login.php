<!DOCTYPE html>
<html>

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
    <section id="main6">
            <!-- vérifier si les données existent déjà -->
          
            <?php

                include "gestion.php";

                if (isset($_POST["f_login"])){ //si le bouton a été cliqué
                    $user=$_POST["email"];//récupérer la valeur et l'ajouter à la variable $user
                    $senha=$_POST["motpasse"];//récupérer la valeur et l'ajouter à la variable $senha
                  
                    $sql="SELECT * FROM tb_vendeurs WHERE usernom='$user' AND mot_pass='$senha'";
                    $res=mysqli_query($con,$sql);
                    $ret=mysqli_fetch_array($res);

                    //tester vérifier le nom et le mot de passe
                    if($ret == 0){
                        echo"<p id='lgErro'> Erreur de connection  </p>";
                        }else{
                            $cle1="abcdefghijklmnopqrstuvwyz";
                            $cle2="ABCDEFGHIJKLMNOPQRSTUVWYZ";
                            $cle3="0123456789";
                            $cle=str_shuffle($cle1.$cle2.$cle3);//pour mixe les valeurs des variables
                            $taille=strlen($cle);//taille de clé(mot passé)
                            $num="";
                            $qtde=rand(20,50);
                            for($i=0;$i<$qtde;$i++){
                                $pos=rand(0,$taille);
                                $num.=substr($cle,$pos,1);
                            }
                            session_start();
                            $_SESSION['numlogin']=$num;
                            $_SESSION['username']=$user;
                            $_SESSION['acess']=$ret['acess']; //Acess =0(limité) 1= total
                            header("Location:management.php?num=$num");
                        }	    
                        
                }
              
                mysqli_close($con);
            
            ?>

            <form action="login.php" method="post" name="f_login" id="f_login">
                <label for="">Utilisateur</label>
                <input type="text" name="email">
                <label for="">Mot Passe</label>
                <input type="password" name="motpasse">
                <input type="submit" value="Entrer" name="f_login">
               
            </form>
    </section>
  

    <footer>
        <?php
            include "footer.php";
        ?> 
    </footer>

</body>
</html>