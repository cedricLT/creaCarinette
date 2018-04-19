<?php
session_start();
require 'app/controllers/controllerUser.php';

try {


    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'crochet') { // recuperation des items crochet page crochet
            crochet();
        }elseif ($_GET['action'] == 'tricot'){ // recuperation des items tricot page tricot
            tricot();
        }



    }else {
        require 'app/views/frontend/homeView.php';
    }


} catch (Exception $e) {
    require 'app/views/frontend/error.php';
}
