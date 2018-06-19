<?php ob_start(); ?>
    <h1 class="h1Title">Publications</h1>


<?php while ($look = $recCrochets->fetch()) {
    ?>
    <div class="row">
        <div class="publicationItem col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="publication">
                <div class="publicationDate">
                    <p><?= $look ['dates_fr'] ?></p>
                </div>

                <h3><?= $look ['title'] ?></h3>

                <div class="publicationImgCont">
                    <?php
                    if ($look ['img'] !== "app/public/img/") {
                        ?>
                        <div class="publicationImg">
                            <a href="<?= $look ['img'] ?>">
                                <img src="<?= $look ['img'] ?>" alt="titoune&laine">
                            </a>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="publicationContent">
                        <p><?= $look ['contents'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php
}
$recCrochets->closeCursor();
?>

    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"index.php?action=item&type=".$_GET['type']."&p=$i\">$i </a>";
        }

        ?>
    </p>


<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>