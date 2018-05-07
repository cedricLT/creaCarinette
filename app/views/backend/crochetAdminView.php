<!--page Crochet admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>

<h1>Gérer vos articles Crochets</h1>

<a href="indexAdmin.php?action=nouveauCrochet"><h3>Créer un nouvel Article Crochet</h3></a>

<div class="contener">

    <?php while ($donner = $recCrochets->fetch()) { ?>

        <div class="blockCrochet">
            <?= $donner['dates_fr'] ?>

            <h3><?= $donner['title'] ?></h3>

            <div class="creationIMG">
                <img src="<?= $donner['img'] ?>" alt="Créa-carinette crochet tricot">

            </div>
            <div class="creationText">
                <P><?= $donner['content'] ?></P>
            </div>
            <div class="gererArticle">
                <div class="voir">
                    <a href="">Voir cette Article sur la page</a>
                </div>
                <div class="modif">
                    <a href="">Modifier cet Article</a>
                </div>
                <div class="suppre">
                    <a href="">Supprimer cet Article</a>
                </div>

            </div>
        </div>

        <?php
    }
    $recCrochets->closeCursor();
    ?>
</div>
</body>
</html>