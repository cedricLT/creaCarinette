<!DOCTYPE html>

<?php ob_start(); ?>

<h1 class="h1Title">Creations Crochet</h1>
<div class="contener">
    <?php while ($donner = $recCrochets->fetch()) { ?>

        <div class="blockCrochet">
            <?= $donner['dates_fr'] ?>
            <h3><?= $donner['title'] ?></h3>
            <div class="creationIMG">
                <a href="index.php?action=itemCrochet&idItem=<?= $donner['idItem'] ?>"><img src="<?= $donner['img'] ?>"
                                                                                            alt="Créa-carinette crochet tricot"></a>
            </div>
            <div class="creationText">
                <P><?= $donner['content'] ?></P>
            </div>
        </div>

        <?php
    }
    $recCrochets->closeCursor();
    ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>