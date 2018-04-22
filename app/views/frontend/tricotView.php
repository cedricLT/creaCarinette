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
        <?php require 'templates/templateTitleTricot.php'?>

        <?php while ($donner = $recTricot->fetch()) { ?>

            <div class="blockCrochet">
               <p class="DateAdd">Ajouté le :<?= $donner['dates_fr'] ?></p>
                <h3><?= $donner['title'] ?></h3>
                <div class="creationIMG">
                    <a href="index.php?action=itemTricot&idTricot=<?= $donner['idTricot'] ?>"><img src="<?= $donner['img'] ?>" alt="Créa-carinette crochet tricot"></a>
                </div>
                <div class="creationText">
                    <P><?= $donner['content'] ?></P>
                </div>
            </div>

            <?php
        }
        $recTricot->closeCursor();
        ?>

        <?php require 'templates/templateFooter.php' ?>

    </div>
</div>
<?php require 'templates/templateScript.php' ?>
</body>
</html>