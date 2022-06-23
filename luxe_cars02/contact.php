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

    
    <script src="contact.js"></script>
   <section id="main">
   <div class="formulario">
            <div class="formBx">
                <!-- Formspree un outil de formulaires de contact par e-mail. Pour connecter formulaire à votre point de terminaison et vos soumissions vous seront envoyées par e-mail. Aucun PHP, Javascript ou inscription requis, parfait pour les sites Web statiques !-->
                <form action="https://formspree.io/f/mbjqwdak" method="POST" id="my-form">
                    <h2>Contactez nous</h2>
                    <div class="inputBox">
                        <input type="text" id="nome" name="name" >
                        <span>Nom et Prénom</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" id="email" 
                        name="email">
                        <span>Email de contact</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="mensagem" ></textarea>
                        <span>Laissez votre message</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Envoyer" class="button">
                    </div>
                </form>
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