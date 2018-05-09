<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>
<h1>Commentaires signalés</h1>

<?php
 while ($report = $reportCom->fetch()) {
     ?>
    <p>Le :<?= $report['dates'] ?></p>
     <p>Pseudo :<br><?= $report['firstname'] ?></p>
     <p>Commentaire :<br><?= $report['content'] ?></p>



     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
         supprimer ce commentaire
     </button>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                     <h4 class="modal-title" id="exampleModalLabel">confirmation de suppression </h4>
                 </div>
                 <div class="modal-body">
                     <div class="suppre">
                         <a href="indexAdmin.php?action=deleteReportComment&idPost=<?= $report['idPost'] ?>&idUsers=<?= $report['idUsers'] ?>">Supprimer ce commentaire</a>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                 </div>
             </div>
         </div>
     </div>

     <?php
 }
?>
</body>
</html>