<?php ob_start(); ?>

<h1 class="h1Title">Créations Tricot</h1>
<div class="itemTotal">
    <div class="itemCreation">
        <?php
        while ($donner = $recTricot->fetch()) {
            ?>
            <hr class="hrCrochet">
            <div class="blockCrochet">
                <h3><?= $donner['title'] ?></h3>
                <div class="creationIMG">
                    <a href="index.php?action=itemTricot&idItem=<?= $donner['idItem'] ?>"><img
                                src="<?= $donner['img'] ?>"
                                alt="Créa-carinette crochet tricot"></a>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>
<p id="numberPages">Pages : <?php
    for ($i = 1; $i <= $numPage; $i++) {
        echo "<a href=\"index.php?action=tricots&p=$i\">$i </a>";
    }
    $recTricot->closeCursor();
    ?>
</p>

<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>

