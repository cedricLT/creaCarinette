<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
</head>
<body>
<h1>Bienvenue dans votre Tableau de Bord</h1>
<div class="articles">
    <h2>Articles</h2>
    <ul>
        <li><a href="indexAdmin.php?action=crochetAdmin">Crochets</a></li>
        <li><a href="indexAdmin.php?action=tricotAdmin">Tricots</a></li>
    </ul>
</div>
<div class="commentaires">
    <h2>Commentaires</h2>
    <ul>
        <li><a href="indexAdmin.php?action=deleteComment">Commentaires par Articles</a></li>
        <li><a href="indexAdmin.php?action=reportComment">Commentaires Signalés</a></li>
    </ul>
</div>
<div class="book">
    <h2>Livre d'or</h2>
    <ul>
        <li><a href="indexAdmin.php?action=visitorBook">Nouveau(x) message(s)</a></li>
        <li><a href="indexAdmin.php?action=reportVisitorBook">Message(s) signalé(s)</a></li>
    </ul>

</div>
<div class="email">
    <h2>E-mail</h2>
    <ul>
        <li>Vos e-mail</li>
    </ul>

</div>

<div class="parametre">
    <h2>Vos Paramètres</h2>
    <li><a href="">Mot de passe</a></li>
    <li><a href="">Nom d'utilisateur</a></li>
</div>
</body>
</html>