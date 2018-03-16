<?php

include_once '../Common/global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

$loginController = new LoginController();
$loginController->route($action);

class LoginController {

    // route us to the appropriate class method for this action
    public function route($action) {
        switch($action) {
            case 'index':
                $this->index();
                break;
        }
    }

    public function index() {
        $pageTitle = 'Family Tree';
        include_once SYSTEM_PATH . '/Navigation/header.html';
        include_once SYSTEM_PATH.'/Login/index.html';
        include_once SYSTEM_PATH.'/Navigation/footer.html';
    }
}