<?php ob_start(); ?>

    <div class="erreurUsers">
        <h1>Erreur : <br><br> <?= $e -> getMessage(); ?></h1>
    </div>
<?php $content = ob_get_clean(); ?>