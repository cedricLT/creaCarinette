<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Titoune&laine</title>
    <meta charset="UTF-8">
    <meta name="Language" CONTENT="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="homeView, tricotView, crochetViews">
    <meta name="copyright" content="Titoune&laine"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Titoune&laine site web de création de  tricot, crochet">
    <meta name="keywords" content="Tricot, Crochet, création, réalisation, tutos, Titoune&laine">

    <!--******************Meta Facebook**************-->
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="Titoune&laine.fr">
    <meta property="og:description" content="Titoune&laine site web de création de  tricot, crochet">
    <meta property="og:title" content="Tricot, Crochet, création, réalisation, tutos, Titoune&laine">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="app/public/css/styleUser.css">
    <link rel="stylesheet" href="app/public/css/normalize.css">
    <link rel="stylesheet" href="app/public/css/animate.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
    <link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake-slow.min.css">

</head>
<body>
<div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="navbar-collapse">
            <nav>
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Creations
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="crochet"><a href="index.php?action=item&type=crochet">Crochets</a></li>
                                <li class="tricot"><a href="index.php?action=item&type=tricot">Tricots</a></li>
                            </ul>
                        </li>
                        <li class="hoverMenu"><a href="index.php?action=item&type=publication">Publications</a></li>
                        <li class="hoverMenu"><a href="index.php?action=book">Livre d'or</a></li>
                        <li class="hoverMenu"><a href="index.php?action=contact">Contact</a></li>
                    </ul>
                        <div class="reseaux">
                            <a class="facebook" href="https://facebook.com/profile.php?id=100009374260556">
                                <img class="facebook"
                                     src="https://png.icons8.com/color/50/000000/facebook.png" alt="crea-carinette"></a>
                            <a class="instagram" href="https://www.instagram.com/titouneetlaine">
                                <img class="instagram"
                                     src="https://png.icons8.com/color/50/000000/instagram-new.png"
                                     alt="crea-carinette"></a>
                        </div>
                </div>
            </nav>
        </div>


    </div>
    <?= $content ?>
    <footer>
        <div class="footer">
            <div class="container">

            </div>
        </div>
    </footer>
</div>

<script src="app/public/js/ajax.js"></script>


<script src="app/public/js/errorChecking.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">

</script>

<script src="app/public/js/menu.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"
        integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D"
        crossorigin="anonymous"></script>
</body>
</html>