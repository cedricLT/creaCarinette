<!DOCTYPE html>
<?php ob_start(); ?>

<?php $name = $newNameAd->fetch() ?>

<h1>Modifier votre Nom Utilisateur</h1>

<p>Votre nom utilisateur actuel est : <?= $name['firstname'] ?></p>

<div class="newName">
    <form action="indexAdmin.php?action=newNameAdmin&idUsers=<?= $_SESSION['idUsers'] ?>" method="post">
        <p>Nouveau nom Utilisateur : <input type="text" name="newName" value="<?= $name['firstname'] ?>"></p>
        <input type='submit' class="submit-btnValider">
    </form>
</div>

<div class="warning">
    <p>
        Attention la modification de votre Nom Utilisateur modifie le nom de la connexion administrateur!
    </p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>