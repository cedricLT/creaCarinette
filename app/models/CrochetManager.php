<?php
require_once('app/models/model.php');

class CrochetManager extends Manager
{
    public function getCrochet(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idCrochet, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr FROM crochet ORDER BY idCrochet');
        $req->execute(array());
        return $req;
    }
}