<?php ob_start(); ?>
<?php require 'templates/logo.php'; ?>
    <h1 class="h1Title">Publications</h1>


<?php while ($look = $lookPublication->fetch()) {
    ?>
    <div class="publication">
        <div class="publicationDate">
            <p><?= $look ['dates_fr'] ?></p>
        </div>

        <h3><?= $look ['title'] ?></h3>

        <div class="publicationImgCont">
            <?php
            if ($look ['img'] !== null) {
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
                <p><?= $look ['content'] ?></p>
            </div>
        </div>
    </div>
    <hr>
    <?php
}
$lookPublication->closeCursor();
?>

    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"index.php?action=publicationUsers&p=$i\">$i </a>";
        }

        ?>
    </p>


<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>