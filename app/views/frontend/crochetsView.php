<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'templates/templateHead.php' ?>
    <title>Créa-carinette Crochets</title>
</head>
<body>
<div class="homePage">
    <div class="container">
        <?php require 'templates/templateMenu.php' ?>
        <h1 class="h1Title">Créations Crochet</h1>

        <?php while ($donner = $recCrochet->fetch()) { ?>

                <div class="blockCrochet">
                <?= $donner['dates_fr'] ?>
                <h3><?= $donner['title'] ?></h3>
                <div class="creationIMG">
                    <img src="<?= $donner['img'] ?>" alt="">
                </div>
                <div class="creationText">
                    <P><?= $donner['content'] ?></P>
                </div>
            </div>

            <?php
        }
        $recCrochet->closeCursor();
        ?>

 <?php require 'templates/templateFooter.php' ?>

    </div>
</div>
<?php require 'templates/templateScript.php' ?>
</body>
</html>