<?php
require_once('app/models/model.php');

class TricotManager extends Manager
{
    public function getTricot(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idTricot, title, content, img,  DATE_FORMAT(postDate, \'%d/%m/%Y\') AS dates_fr FROM tricot ORDER BY idTricot');
        $req->execute(array());
        return $req;
    }
}