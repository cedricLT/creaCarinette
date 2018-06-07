<!--modif text publication-->
<?php ob_start(); ?>
<?php $text = $textPublis->fetch() ?>
<div class="creationItemCrochet">
    <div class="titleCrochet">
        <h1>Modification de votre texte publication</h1>
    </div>

    <br>
    <hr>
    <br>
    <form action="indexAdmin.php?action=newModifPublication&idPublication=<?= $text['idPublication'] ?>" method="post" enctype="multipart/form-data">

        <div class="creationTitre">

            <label for="titre">Titre :</label> <br/>
            <input type="text" name="title" value="<?= $text['title'] ?>"/>
        </div>

        <br><br>
        <div class="imgPublication">

            <textarea id="elm1" name="area" value"<?= $text['content'] ?>"></textarea>
        </div>
        <div class="submitBtn">
            <input type="submit" id="envoyer" name="submit" value="Publier"/>
        </div>
    </form>
</div>


<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
