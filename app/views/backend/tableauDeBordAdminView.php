<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>
<div class="container-fluid">
    <div class="deconnexion">
        <a href="indexAdmin.php?action=deconnexion"><button>Déconnexion</button></a>
    </div>

    <br>
    <div class="titleTdb">
        <h1>Bienvenue dans votre Tableau de Bord <?= $_SESSION['firstname'] ?></h1>
    </div>
    <br>
    <br>
    <div class="blockAdmin">
        <div class="articlesTdb">

            <h2>Articles</h2>
            <br>
            <div class="articles">
                <ul>
                    <?php $itemC = $nbrItemCrochet->fetch() ?>
                    <li>
                       <a href="indexAdmin.php?action=crochetAdmin"><button><?= $itemC[0] ?> Articles Crochets</button></a>

                    </li>
                    <br>
                    <?php $itemT = $nbrItemTricot->fetch() ?>
                    <li>
                        <a href="indexAdmin.php?action=tricotAdmin"><button><?= $itemT[0] ?> Articles Tricots</button></a>

                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="commentairesTdb">
            <h2>Commentaires</h2>
            <br>
            <div class="commentaires">
                <ul>
                    <?php $comment = $nbrComment->fetch() ?>
                    <li>
                       <a href="indexAdmin.php?action=deleteComment"><button><?= $comment[0] ?> Commentaires par
                               Articles</button></a>

                    </li>
                    <br>
                    <?php $commentReport = $nbrCommentReport->fetch() ?>
                    <li>
                      <a href="indexAdmin.php?action=reportComment"><button><?= $commentReport[0] ?> Commentaires
                              Signalés</button></a>

                    </li>
                </ul>
            </div>
        </div>

        <hr>


        <div class="bookTdb">
            <h2>Livre d'or</h2>
            <br>
            <div class="book">
                <ul>
                    <?php $commentBook = $nbrCommentBook->fetch() ?>
                    <li>
                        <a href="indexAdmin.php?action=visitorBook"><button><?= $commentBook[0] ?> Message(s)</button></a>

                    </li>
                    <br>
                    <?php $commentReportBook = $nbrReportBook->fetch() ?>
                    <li>
                        <a href="indexAdmin.php?action=reportVisitorBook"><button><?= $commentReportBook[0] ?>
                                Message(s)
                                signalé(s)</button></a>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="publicationTdb">
            <h2>Publication</h2>
            <br>
            <div class="publication">
                <ul>
                    <?php $publication = $nbrPublications->fetch() ?>
                    <li>
                        <a href="indexAdmin.php?action=publication"><button><?= $publication[0] ?> Publication(s)</button></a>

                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="emailTdb">
            <h2>E-mail</h2>
            <br>
            <div class="email">
                <ul>
                    <?php $mail = $nbrMail->fetch() ?>
                    <li>
                       <a href="indexAdmin.php?action=mail"><button><?= $mail[0] ?> E-mail</button></a>
                    </li>
                </ul>

            </div>
        </div>

        <hr>

        <div class="parametreTdb">
            <h2>Vos Paramètres</h2>
            <br>
            <div class="parametre">
                <ul>
                    <li>
                        <a href="indexAdmin.php?action=homeText"><button>Modifier votre texte d'accueil</button></a>
                    </li>
                    <br>
                    <li>
                       <a href="indexAdmin.php?action=imgHome"><button>Modifier photo d'accueil</button></a>
                    </li>
                    <br>
                    <li>
                        <a href="indexAdmin.php?action=newMdp&idUsers=<?= $_SESSION['idUsers'] ?>"><button>Mot de
                                passe</button></a>

                    </li>
                    <br>
                    <li>
                        <a href="indexAdmin.php?action=newName&idUsers=<?= $_SESSION['idUsers'] ?>"><button>Nom
                                d'utilisateur</button></a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>