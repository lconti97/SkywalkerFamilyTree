<?php

include_once '../Common/global.php';
include_once '../Milestones/MilestoneQueryFactory.class.php';
include_once '../Milestones/Milestone.class.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

$familyMemberController = new FamilyMemberController();
$familyMemberController->route($action);

class FamilyMemberController {

    // route us to the appropriate class method for this action
    public function route($action) {
        switch($action) {
            case 'view':
                # $familyMemberName = $_GET['name'];
                $id = 1;
                $this->view($id);
                break;
            case 'add':
                $this->add();
                break;
            case 'index':
                $this->index();
                break;
            case 'addProcess':
                $this->addProcess();
                break;
        }
    }

    public function view($id) {
        $milestoneQueryFactory = new MilestoneQueryFactory();
        $milestones = $milestoneQueryFactory->get(0, $id);
        echo (count($milestones));
//        $pageTitle = 'Timeline';
//        include_once SYSTEM_PATH . '/Navigation/header.html';
//        if($name == 'Anakin Skywalker')
//            include_once SYSTEM_PATH.'/FamilyMember/view.html';
//        include_once SYSTEM_PATH.'/Navigation/footer.html';
    }

   public function index() {
       $pageTitle = 'Family Tree';
       include_once SYSTEM_PATH . '/Navigation/header.html';
       include_once SYSTEM_PATH.'/FamilyMember/index.html';
       include_once SYSTEM_PATH.'/Navigation/footer.html';
   }

   public function add() {
       $pageTitle = 'Add Family Member';
       include_once SYSTEM_PATH . '/Navigation/header.html';
       include_once SYSTEM_PATH.'/FamilyMember/add.html';
       include_once SYSTEM_PATH.'/Navigation/footer.html';
    }

    public function addProcess() {
        $title = $_POST['title'];
        echo($title);
    }
}
