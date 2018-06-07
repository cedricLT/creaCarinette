<?php ob_start(); ?>
    <h1 class="h1Title">Publications</h1>


<?php while ($look = $lookPublication->fetch() ){
    ?>
    <p><?= $look ['dates_fr'] ?></p>
    <h3><?= $look ['title'] ?></h3>
    <?php
    if ( $look ['img'] !== null ){
        ?><img src="<?= $look ['img'] ?>" alt="titoune&laine">
        <?php
    }
    ?>
    <p><?= $look ['content'] ?></p>

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