<!--page modification d'un  article admin-->
<?php ob_start(); ?>
<?php $modif = $modifItemC ?>
<div class="titleCrochet">
    <h1>Modification du texte</h1>
</div>
<?= $modif['categorie']?>
<div class="creationItemCrochet">
    <form action="indexAdmin.php?action=modifItem&idItem=<?= $modif['idItem'] ?>&type=<?= $modif['categorie'] ?>" method="post"
          enctype="multipart/form-data">
        <div class="creationTitre">
            <label for="titre">Titre :</label> <br/>
            <input type="text" name="title" value=" <?= $modif['title'] ?>"/>
        </div>

        <br><br>
        <div class="modifCrochetImg">
            <img src="<?= $modif['img'] ?>" id="blah" alt="image"/>
        </div>
        <br><br>
        <textarea id="elm1" name="area" value"<?= $modif['contents'] ?>"></textarea>

        <div class="submitBtn">
            <input type="submit" id="envoyer" name="submit" value="Publier"/>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>