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
    <!--fonctionnalité des boutons de menu -->
    <script src="jquery.js"></script>
    
    <script>
        $(document).ready(function(){
            $("#menub1, #menub2, #menub3,#menub4").css("visibility","hidden");
            $("#menua1").click(function(){
                $("#menub1").css("visibility","visible");
                $("#menub2").css("visibility","hidden");
                $("#menub3").css("visibility","hidden");
                $("#menub4").css("visibility","hidden");
            });

            $("#menua2").click(function(){
                $("#menub2").css("visibility","visible");
                $("#menub1").css("visibility","hidden");
                $("#menub3").css("visibility","hidden");
                $("#menub4").css("visibility","hidden");
            });

            $("#menua3").click(function(){
                $("#menub3").css("visibility","visible");
                $("#menub2").css("visibility","hidden");
                $("#menub1").css("visibility","hidden");
                $("#menub4").css("visibility","hidden");
            });

            $("#menua4").click(function(){
                $("#menub4").css("visibility","visible");
                $("#menub2").css("visibility","hidden");
                $("#menub3").css("visibility","hidden");
                $("#menub1").css("visibility","hidden");
            });
            $("#menub1, #menub2, #menub3, #menub4").mouseover(function() {
                $(this).css("visibility","visible");
            });

            $("#menub1, #menub2, #menub3, #menub4").mouseout(function() {
                $(this).css("visibility","hidden");
            });
        });
    </script>
    <title>Management</title>
</head>
<body>
    <header>
        <?php
            include "topo.php";
        ?>
    </header>
    <section id="title">
        <div >
            <h1> Menu de Management </h1>
        </div> 
    </section>
        <nav id="management">
            <div class="menu_manag">
                
                <button id="menua1" class="button" type="">Voitures</button>
                <div id="menub1"   class="menub">
                    <a href="nouv_voiture.php" target="_self">Nouveau</a>
                    <a href="mod_voitures.php" target="_self">Modifier</a>
                    <a href="sup_voitures.php" target="_self">Effacer</a>
                    <a href="mar_mod.php" target="_self">Marques / Modèles</a>
                </div>
            </div>
            <div class="menu_manag">
                <button id="menua2" class="button" type="">Slider</button>
                <div id="menub2"  class="menub">
                    <a href="" target="_self">Configurer</a>
                </div>
            </div>
            <div class="menu_manag">
                <button id="menua3" class="button">Utilisateurs</button>
                <div id='menub3'  class='menub'>
                    <a href="nouveau_vendeurs.php" target='_self'>Nouveau</a>
                    <a href='mod_vendeur.php' target='_self'>Modifier</a>
                    <a href='supprimer.php' target='_self'>Effacer</a>
                </div>
            </div>
            <div class="menu_manag">
                <button id="menua4" class="button" type="">Sortir</button>
                <div id="menub4"  class="menub">
                    <a href="index.php" target="_self">Sortir</a>  
                </div>
            </div>
        </nav>
        <footer>
            <?php
                include "footer.php";
            ?> 
        </footer>
    </body>
</html>