<?php ob_start(); ?>

<div class="confirmMail">
    <h1>Votre mail a été envoyé avec succès</h1>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>
