<!DOCTYPE html>
<?php ob_start(); ?>

<h1 class="h1Title">Créa-carinette</h1>
<!-- <div class="contener2">
             <div id="slideshow">
                 <div class="lol">
                     <img src="app/public/img/slider/groot.jpg" alt>
                 </div>
                 <div>
                     <img src="app/public/img/slider/poncho.jpg" alt="">
                 </div>
                 <div>
                     <img src="app/public/img/slider/sacAmain.jpg" alt="">
                 </div>
             </div>
         </div>-->

<div class="container">
    <div class="row">
        <div class="textImg col-xs-12 sm-col-12">
            <section>
                <div class="profileImg col-xs-12 col-sm-6">
                    <img src="app/public/img/profile/carine.jpg" alt="Créa-carinette carine">
                </div>

                <article>
                    <div class="presentation col-xs-12 col-sm-6">
                        <p>Bienvenue sur Créa-Carinette !<br>
                            Vous allez découvrir une partie de mes créations faites au crochet ou tricot. Grâce
                            à
                            différents sites web, tutos et videos, j'ai pu réaliser ces différents modèles.
                            Je vous souhaite une bonne visite sur mon site web.
                        </p>
                    </div>
                </article>
            </section>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>


