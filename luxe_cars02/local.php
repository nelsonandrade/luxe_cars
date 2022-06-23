<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/luxe_cars.ico" type="image/x-icon">
    <title>Luxe Cars</title>
</head>
<body>
    <header>
        <?php
        include "topo.php";
        ?>
    </header>
    
    <section id="main_local">
            <h1>Nous sommes ici à votre écoute</h1>
    <!-- carte google  -->
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d23056.751129268676!2d7.42732!3d43.750147!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2sfr!4v1654704086403!5m2!1spt-PT!2sfr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div id="cont_local">
                <div>
                    <p>Adress</p>
                    <p>Av de la Costa - 98000 Monaco</p>
                    <p>Téléphone</p>
                    <p>(+377)98989900</p>
                </div>
                <div>
                    <p>Email</p>
                    <p>luxe_cars@lxcars.com</p>
                </div>
            </div>
    </section>

    <section id="info">
        <?php
        include "info.html";
        ?> 
    </section>

    <footer>
        <?php
        include "footer.php";
        ?> 
    </footer>

</body>
</html>