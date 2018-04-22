<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require 'templates/templateHead.php' ?>
    <title>Créa-carinette</title>
</head>
<body>
<div class="homePage">
    <div class="container">
        <?php require 'templates/templateMenu.php' ?>
        <?php require 'templates/templatetitleCrochet.php' ?>
        <?php $donner = $recCrochet ?>
        <div class="blockCrochet">
            <p class="DateAdd">Ajouté le :<?= $donner['dates_fr'] ?></p>
            <h3><?= $donner['title'] ?></h3>
            <div class="creationIMG">
                <img src="<?= $donner['img'] ?>" alt="Créa-carinette crochet tricot">
            </div>
            <div class="creationText">
                <P><?= $donner['content'] ?></P>
            </div>
        </div>
        <?php require 'templates/templateFooter.php' ?>
    </div>
</div>
</body>
</html>