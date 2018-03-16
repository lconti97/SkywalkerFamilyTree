<?php

include_once '../Common/global.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

// instantiate a SoldierController and route it
$sc = new FamilyMemberController();
$sc->route($action);

class FamilyMemberController {

    // route us to the appropriate class method for this action
    public function route($action) {
        switch($action) {

            case 'view':
                # $familyMemberName = $_GET['name'];
                $familyMemberName = 'Anakin Skywalker';
                $this->view($familyMemberName);
                break;

//TODO:
//            case 'index':
//                $this->index();
//                break;
//
//            case 'add':
//                $this->add();
//                break;
//
//            case 'addProcess':
//                $this->addProcess();
//                break;
        }

    }

    public function view($name) {
        $pageTitle = 'Timeline';
        include_once SYSTEM_PATH . '/Navigation/header.html';
        if($name == 'Anakin Skywalker')
            include_once SYSTEM_PATH.'/FamilyMember/timeline.html';
        include_once SYSTEM_PATH.'/Navigation/footer.html';
    }

    // TODO:
//    public function index() {
//        $pageTitle = 'Family Tree';
//        include_once SYSTEM_PATH.'/FamilyMember/header.tpl';
//        include_once SYSTEM_PATH.'/view/soldiers.tpl';
//        include_once SYSTEM_PATH.'/view/footer.tpl';
//    }
//
//    public function add() {
//        $pageTitle = 'Add Family Member';
//        include_once SYSTEM_PATH.'/view/header.tpl';
//        include_once SYSTEM_PATH.'/view/addSoldier.tpl';
//        include_once SYSTEM_PATH.'/view/footer.tpl';
//    }
//
//    public function addProcess() {
//        $firstName = $_POST['first_name']; // required
//        $lastName = $_POST['last_name']; // required
//        $rank = $_POST['rank'];
//        $enlisted = $_POST['enlisted'];
//        $musteredOut = $_POST['mustered_out'];
//        $fileName = $_POST['file_name'];
//
//        // first name and last name are required
//        if( empty($firstName) || empty($lastName) ) {
//            header('Location: '.BASE_URL.'/soldier/add/'); exit();
//        }
//
//        //print_r($_POST);
//
//        // connect to database
//        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
//        if($conn->connect_error)
//            die('Error: '.$conn->connect_error);
//
//        // build insert query
//        $q = "INSERT INTO soldier (first_name, last_name, `rank`, enlisted, mustered_out, file_name)
//			VALUES ('".$firstName."', '".$lastName."', '".$rank."', '".$enlisted."', '".$musteredOut."', '".$fileName."')";
//        // execute query
//        if($conn->query($q)) {
//            // insert successful; let's redirect to new page
//            header('Location: '.BASE_URL.'/soldier/add/'); exit();
//        } else {
//            die('Error: '.$conn->error);
//        }
//
//    }

}
