<!--page modification d'un  article Crochet admin-->
<?php ob_start(); ?>
<?php $modif = $modifItemC ?>
<div class="creationItemCrochet">
    <h1>Modification d'un nouvel Article Crochet</h1>


    <form action="indexAdmin.php?action=modifItemCrochet&idItem=<?= $modif['idItem'] ?>" method="post" enctype="multipart/form-data" >
        <div class="creationTitre">
            <label for="titre">Titre :</label> <br/>
            <input required type="text" name="title" value="<?= $modif['title'] ?>"/>
        </div>

        <br><br>

            <img src ="<?= $modif['img'] ?>" id="blah"  alt="image" />

        <br><br>
        <textarea id="elm1" name="area" value"<?= $modif['contents'] ?>"></textarea>

        <div class="submitBtn">
            <input type="submit" id="envoyer" name="submit" value="Publier"/>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>