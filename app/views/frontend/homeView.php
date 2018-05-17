<!DOCTYPE html>
<?php ob_start(); ?>

<h1 class="h1Title">Titoune&laine</h1>
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
        <div class="textImg col-xs-12 col-sm-12">
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
                            <br>
                            N'ésitez pas laisser vos commentaire sur les différentes création.
                            <br>
                            Vous pouvez signer le livre d'or en laissant un petit message.
                            <br>
                            Vous pouvez également me contacter via le formulaire de contact en m'envoyant un mail!
                            <br>
                            Je vous souhaite une bonne visite sur mon site web.
                        </p>
                    </div>
                </article>
            </section>
        </div>
        <section>
            <article>
                <div class="lastItem">
                    <div class="titleLastItem">
                        <h3 class="titleItem">Mes dèrnières réalisations</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="lastItemC col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <h3 class="titleImg">Crochet</h3>
                                <div class="contenueItem">
                                    <?php $item = $itemC->fetch() ?>

                                    <h4><?= $item['title'] ?></h4>
                                    <a href="index.php?action=itemCrochet&idItem=<?= $item['idItem'] ?>"><img
                                                src="<?= $item['img'] ?>" alt="créa-carinette crochet tricot"></a>
                                </div>

                            </div>


                            <div class="lastItemT col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                                <h3 class="titleImg">Tricot</h3>
                                <div class="contenueItem">
                                    <?php $item = $itemT->fetch() ?>

                                    <h4><?= $item['title'] ?></h4>
                                    <a href="index.php?action=itemTricot&idItem=<?= $item['idItem'] ?>"><img
                                                src="<?= $item['img'] ?>" alt="créa-carinette crochet tricot"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>


