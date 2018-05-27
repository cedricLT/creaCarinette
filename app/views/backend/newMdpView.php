<!DOCTYPE html>
<?php ob_start(); ?>

<?php $admin = $mdpAdmin->fetch() ?>

<div class="titleCrochet">
    <h1>Modifier votre mot de passe <?= $admin['firstname'] ?></h1>
</div>
<br><br>
<div class="newMdp">
    <form action="indexAdmin.php?action=changeMdp&idUsers=<?= $_SESSION['idUsers'] ?>" method="post">

        <div class="actuMdp">
            <p>taper votre mot de passe actuel : </p>
            <input type="password" id="mdp" class="mdp" name="mdp" required placeholder="mot de passe actuel">
        </div>
        <div class="newMdp1">
            <p>taper votre nouveau mot de passe : </p>
            <input type="password" id="newMdp" class="newMdp2" name="newMdp" autocomplete="off"
                   placeholder="nouveau mot de passe" required>
        </div>
        <div class="newMdp1">
            <p>confirmer votre nouveau mot de passe : </p>
            <input type="password" id="newMdp2" class="newMdp2" name="newMdp2" autocomplete="off"
                   placeholder="Confirmation mot de passe" required>
        </div>
        <br><br>
        <input type='submit' id="btn_submit" class="btn_submit">
    </form>
</div>
<div id="pop" class="pop">
    <p>Votre mot de passe correspond à la première saisie vous pouvez valider</p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
