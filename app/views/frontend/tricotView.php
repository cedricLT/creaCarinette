<?php ob_start(); ?>

<h1 class="h1Title">Créations Tricot</h1>

<hr class=" hrTitle">

<div class="itemTotal">

    <div class="row">

        <div class="itemCreation col-md-12 col-lg-12">
            <?php
            while ($donner = $recTricot->fetch()) {
                ?>
                <hr class="hrCrochet">

                <div class="blockItemImg col-md-6 col-lg-4">
                    <div class="blockCrochet">

                        <h3><?= $donner['title'] ?></h3>
                        <div class="creationIMG">
                            <div class="shake-slow">
                                <a href="index.php?action=itemTricot&idItem=<?= $donner['idItem'] ?>"><img
                                            src="<?= $donner['img'] ?>"
                                            alt="Créa-carinette crochet tricot"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            $recTricot->closeCursor();
            ?>
        </div>
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

