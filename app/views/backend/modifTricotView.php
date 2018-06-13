<!--page modification d'un  article tricot admin-->
<!DOCTYPE html>
<?php ob_start(); ?>
<?php $modif = $modifItemT ?>
<div class="titleCrochet">
    <h1>Modification du texte</h1>
</div>
<div class="creationItemCrochet">

    <form action="indexAdmin.php?action=modifItemTricot&idItem=<?= $modif['idItem'] ?>" method="post"
          enctype="multipart/form-data">
        <div class="creationTitre">
            <label for="titre">Titre :</label> <br/>
            <input required type="text" name="title" value="<?= $modif['title'] ?>"/>
        </div>
        <br><br>

        <img src="<?= $modif['img'] ?>" id="blah" src="#" alt="image"/>


        <br><br>
        <textarea id="elm1" name="area" value"<?= $modif['contents'] ?>"></textarea>

        <div class="submitBtn">
            <input type="submit" id="envoyer" name="submit" value="Publier"/>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
