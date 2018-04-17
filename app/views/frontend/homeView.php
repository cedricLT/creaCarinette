<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'templates/templateHead.php' ?>
    <title>Créa-carinette</title>
</head>
<body>
    <div class="contener">
        <div class="contener1">
            <header>
                <?php require 'templates/templateMenu.php'?>
                <?php require 'templates/templateH1.php' ?>
            </header>
        </div>

        <div class="contener2">
            <div id="slideshow">
                <div>
                    <img src="app/public/img/slider/groot.jpg" alt>
                </div>
                <div>
                    <img src="app/public/img/slider/poncho.jpg" alt="">
                </div>
                <div>
                    <img src="app/public/img/slider/sacAmain.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="contener3">
            <section>
                <div class="profileImg">
                    <img src="app/public/img/carine.jpg" alt="Créa-carinette carine">
                </div>

                <article>
                    <div class="presentation">
                        <p>Bienvenue sur Créa-Carinette!
                            Vous allez découvrir une partie de mes créations faites au crochet ou tricot. Grâce à différents sites web, tutos et videos, j'ai pu réaliser ces différents modèles.
                            Je vous souhaite une bonne visite sur mon site web.
                        </p>
                    </div>
                </article>
            </section>
        </div>
    </div>
<?php require'templates/templateFooter.php' ?>
</body>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">

</script>
<script src="app/public/js/sliderHome.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>

</html>