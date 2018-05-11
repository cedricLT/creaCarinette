<!DOCTYPE html>
<?php ob_start(); ?>

<h1 class="h1Title">Créations Tricot</h1>
<div class="contener">

<?php while ($donner = $recTricot->fetch()) { ?>

    <div class="blockCrochet">
        <p class="DateAdd">Ajouté le :<?= $donner['dates_fr'] ?></p>
        <h3><?= $donner['title'] ?></h3>
        <div class="creationIMG">
            <a href="index.php?action=itemTricot&idItem=<?= $donner['idItem'] ?>"><img src="<?= $donner['img'] ?>"
                                                                                       alt="Créa-carinette crochet tricot"></a>
        </div>
        <div class="creationText">
            <P><?= $donner['contents'] ?></P>
        </div>
    </div>

    <?php
}
?>

<p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"index.php?action=tricots&p=$i\">$i </a>";
        }
    $recTricot->closeCursor();
        ?>
    </p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>

