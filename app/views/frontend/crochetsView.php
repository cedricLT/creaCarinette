<?php ob_start(); ?>

    <h1 class="titleCrochet">Créations Crochet</h1>

    <hr class=" hrTitle">

    <div class="itemTotal">

        <div class="row">
            <div class="itemCreation col-md-12 col-lg-12">
                <?php
                while ($donner = $recCrochets->fetch()) {
                    ?>
                    <hr class="hrCrochet">

                    <div class="blockItemImg  col-md-6 col-lg-4">
                        <div class="blockCrochet ">

                            <h3><?= htmlspecialchars($donner['title']) ?></h3>
                            <div class="creationIMG">
                                <div class="shake-slow">
                                    <a href="index.php?action=itemCrochet&idItem=<?= $donner['idItem'] ?>"><img
                                                src="<?= htmlspecialchars($donner['img']) ?>"
                                                alt="Créa-carinette crochet tricot"></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php

                }
                $recCrochets->closeCursor();
                ?>
            </div>
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