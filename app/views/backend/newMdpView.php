<!DOCTYPE html>
<?php ob_start(); ?>

<?php $admin = $mdpAdmin->fetch() ?>


<h1>Modifier votre mot de passe <?= $admin['firstname'] ?></h1>

<form action="indexAdmin.php?action=changeMdp&idUsers=<?= $_SESSION['idUsers'] ?>" method="post">
    <p>taper votre mot de passe actuel : <br><input type="password" name="mdp" required placeholder="mot de passe actuel"></p>

    <p>taper votre nouveau mot de passe : <br><input type="password" name="newMdp" autocomplete="off" placeholder="nouveau mot de passe" required></p>

    <p>confirmer votre nouveau mot de passe : <br><input type="password" name="newMdp2" autocomplete="off" placeholder="Confirmation mot de passe" required></p>

    <input type='submit'>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
