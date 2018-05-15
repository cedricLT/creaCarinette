<!DOCTYPE html>
<?php ob_start(); ?>

<?php $admin = $mdpAdmin->fetch() ?>


<h1>Modifier votre mot de passe <?= $admin['firstname'] ?></h1>

<form action="indexAdmin.php?action=changeMdp&idUsers=<?= $_SESSION['idUsers'] ?>" method="post">

    <p>taper votre mot de passe actuel : </p>
        <input type="password" id="mdp" class="mdp" name="mdp" required placeholder="mot de passe actuel">

    <p>taper votre nouveau mot de passe : </p>
        <input type="password" id="newMdp" class="newMdp" name="newMdp" autocomplete="off" placeholder="nouveau mot de passe" required>

    <p>confirmer votre nouveau mot de passe : </p>
        <input type="password" id="newMdp2" class="newMdp2" name="newMdp2" autocomplete="off" placeholder="Confirmation mot de passe" required>
    <br><br>
    <input type='submit' id="btn_submit" class="btn_submit">
</form>

<div id="pop" class="pop">
    <p>Votre mot de passe correspond à la première saisie vous pouvez valider</p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
