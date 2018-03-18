<?php

include_once '../Common/global.php';
include_once 'Milestone.class.php';
include_once 'MilestoneQueryFactory.class.php';

// get the identifier for the page we want to load
$action = $_GET['action'];

$milestoneController = new MilestoneController();
$milestoneController->route($action);

class MilestoneController {

    // route us to the appropriate class method for this action
    public function route($action) {
        switch($action) {
            case 'addProcess':
                $this->addProcess();
                break;
        }
    }

    public function addProcess() {
        $milestone = new Milestone();

        $milestone->year = $_POST['year'];
        $milestone->era = $_POST['era'];
        $milestone->title = $_POST['title'];
        $milestone->description = $_POST['description'];
        $milestone->alignment = $_POST['alignment'];
        
        $milestoneQueryFactory = new MilestoneQueryFactory();
        $milestoneQueryFactory->save($milestone);

        header('Location: '.BASE_URL.'/FamilyMember/view/');
        exit();
    }
}