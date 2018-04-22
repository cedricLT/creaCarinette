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
        <?php require 'templates/templatetitleCrochet.php' ?>

        <?php while ($donner = $recCrochets->fetch()) { ?>

                <div class="blockCrochet">
                <?= $donner['dates_fr'] ?>
                <h3><?= $donner['title'] ?></h3>
                <div class="creationIMG">
                    <a href="index.php?action=itemCrochet&idCrochet=<?= $donner['idCrochet'] ?>"><img src="<?= $donner['img'] ?>" alt="Créa-carinette crochet tricot"></a>
                </div>
                <div class="creationText">
                    <P><?= $donner['content'] ?></P>
                </div>
            </div>

            <?php
        }
        $recCrochets->closeCursor();
        ?>


 <?php require 'templates/templateFooter.php' ?>

    </div>
</div>
<?php require 'templates/templateScript.php' ?>
</body>
</html>