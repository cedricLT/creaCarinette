<?php ob_start(); ?>
<div class="titleCrochet">
    <h1>toutes vos publications</h1>
</div>
<button><a href="indexAdmin.php?action=newPublication">éditer une nouvelle publication</a></button>

<?php while ($look = $lookPublication->fetch() ){
    ?>
    <p>publier le <?= $look ['dates_fr'] ?></p>
    <h3><?= $look ['title'] ?></h3>
    <img src="<?= $look ['img'] ?>" alt="titoune&laine">
    <p><?= $look ['content'] ?></p>

    <?php
}
$lookPublication->closeCursor();
?>





<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
