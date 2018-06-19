<!--page presentation des items crochets et tricots-->
<?php ob_start(); ?>

<?php
if($_GET['type'] == 'crochet'){
?>

    <h1 class="titleCrochet">Créations Crochet</h1>
<?php
}
    else{
    ?>
    <h1 class="titleCrochet">Créations Tricot</h1>
<?php
}
?>
    <hr class=" hrTitle">

    <div class="itemTotal">

        <div class="row">
            <div class="itemCreation col-md-12 col-lg-12">
                <?php
                    foreach ($donnee as $donner){
                    ?>
                    
                    <hr class="hrCrochet">

                    <div class="blockItemImg  col-md-6 col-lg-4">
                        <div class="blockCrochet ">

                            <h3><?= htmlspecialchars($donner['title']) ?></h3>
                            <div class="creationIMG">
                                <div class="shake-slow">
                                    <a href="index.php?action=itemCreations&idItem=<?= $donner['idItem'] ?>"><img
                                                src="<?= htmlspecialchars($donner['img']) ?>"
                                                alt="Créa-carinette crochet tricot"></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php

}
                ?>
            </div>
        </div>
    </div>
    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"index.php?action=item&type=".$_GET['type']."&p=$i\">$i </a>";
        }
        $recCrochets->closeCursor();
        ?>
    </p>
<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>