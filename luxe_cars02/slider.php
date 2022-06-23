<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/luxe_cars.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>
   
</head>
<body>
    <div class="container">
            <!-- Slider main container -->
        <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide"><img src="img/aston-martin.jpg"></div>
            <div class="swiper-slide"><img src="img/audi-rs-e-tron-gt.jpg" ></div>
            <div class="swiper-slide"><img src="img/maserati-mc20.jpg"
            ></div>
            <div class="swiper-slide"><img src="img/nio-et5.jpg"
            ></div>
            >
        </div>
        <!-- buttons-->
        <div class="swiper-pagination"></div>

        <!-- Buttons de navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>  

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="responsiveslides.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        autoplay:{
            delay:2500,
            disableOnInteraction:false,
        },
        
        loop: true,

        pagination: {
            el: '.swiper-pagination',
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>
</body>
</html>