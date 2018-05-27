<?php ob_start(); ?>

<?php $name = $newNameAd->fetch() ?>

    <div class="titleCrochet">
        <h1>Modifier votre Nom Utilisateur</h1>
    </div>

    <div class="pseudoname">
        <p>Votre nom utilisateur actuel est : <?= $name['firstname'] ?></p>
    </div>
    <hr>
    <div class="newNameAdmin">
        <form action="indexAdmin.php?action=newNameAdmin&idUsers=<?= $_SESSION['idUsers'] ?>" method="post">

            <div class="changeName">
                <p>Nouveau nom Utilisateur : </p><input type="text" name="newName" class="newName" value="<?= $name['firstname'] ?>">
            </div>
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