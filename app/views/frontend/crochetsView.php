<?php ob_start(); ?>

<h1 class="titleCrochet">Creations Crochet</h1>
<div class="itemTotal">
    <div class="itemCreation">
        <?php
        while ($donner = $recCrochets->fetch()) {
            ?>
            <hr class="hrCrochet">

            <div class="blockCrochet">

                <h3><?= htmlspecialchars($donner['title']) ?></h3>
                <div class="creationIMG">
                    <a href="index.php?action=itemCrochet&idItem=<?= $donner['idItem'] ?>"><img
                                src="<?= htmlspecialchars($donner['img']) ?>"
                                alt="Créa-carinette crochet tricot"></a>

                </div>cliquez sur l'image
            </div>


            <?php

        }
        $recCrochets->closeCursor();
        ?>
    </div>
</div>
<p id="numberPages">Pages : <?php
    for ($i = 1; $i <= $numPage; $i++) {
        echo "<a href=\"index.php?action=crochet&p=$i\">$i </a>";
    }
    $recCrochets->closeCursor();
    ?>
</p>
<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>