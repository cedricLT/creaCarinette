<!-- chanement du text de presentation accueil -->
<?php ob_start(); ?>

<div class="creationItemCrochet">
    <div class="titleCrochet">
        <h1>Modification de votre texte d'accueil</h1>
    </div>

    <?php $read = $newtext ?>


    <form action="indexAdmin.php?action=newTextHome" method="post" enctype="multipart/form-data">
        <br><br>
        <textarea id="elm1" name="area" value"<?= $read['content'] ?>"></textarea>



        <div class="submitBtn">
            <input type="submit" id="envoyer" name="submit" value="Publier"/>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>