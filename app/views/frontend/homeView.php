<?php ob_start(); ?>

<h1 class="h1Title">Titoune&Laine</h1>

<div class="row">
    <div class="textImg col-xs-12 col-sm-12">

        <div class="profileImg col-xs-12 col-sm-6">
            <?php $img = $imgHome->fetch() ?>
            <div class="shake-slow">
                <img src="<?= $img['img'] ?>" alt="Titoune&Laine carine crochet tricot cours de crochet">
            </div>
        </div>

        <div class="presentation col-xs-12 col-sm-5">
            <?php $read = $newtext ?>
            <?= $read ['content'] ?>
        </div>
    </div>
</div>


<div class="lastItem">
    <div class="titleLastItem">
        <h3 class="titleItem">Mes dernières réalisations</h3>
    </div>
    <hr>
    <div class="row">
        <div class="item col-xs-12 col-sm-12 col-md-12 col-lg-12">


            <div class="lastItemC col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="titleLastItem">
                    <h3 class="titleImg">Crochet</h3>
                </div>
                <div class="contenueItem">
                    <?php $item = $itemC->fetch() ?>

                    <h4><?= $item['title'] ?></h4>
                    <div class="shake-slow">
                        <a href=" index.php?action=itemCrochet&idItem=<?= $item['idItem'] ?>"><img
                                    src="<?= $item['img'] ?>" alt="créa-carinette crochet tricot"></a>
                    </div>
                </div>

            </div>

            <div class="lastItemT col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                <div class="titleLastItem">
                    <h3 class="titleImg">Tricot</h3>
                </div>
                <div class="contenueItem">
                    <?php $item = $itemT->fetch() ?>

                    <h4><?= $item['title'] ?></h4>
                    <div class="shake-slow">
                        <a href="index.php?action=itemTricot&idItem=<?= $item['idItem'] ?>"><img
                                    src="<?= $item['img'] ?>" alt="créa-carinette crochet tricot"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>


