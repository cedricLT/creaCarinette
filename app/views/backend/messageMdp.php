<!DOCTYPE html>
<?php ob_start(); ?>

<h1>Félicitation votre nouveau mot de passe a bien été pris en compte !</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
