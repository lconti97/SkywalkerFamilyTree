<?php

include_once '../Common/global.php';
include_once 'Milestone.class.php';
include_once 'MilestoneQueryFactory.class.php';

// get the identifier for the page we want to load
$action = $_SERVER['REQUEST_METHOD'];

$milestoneController = new MilestoneController();
$milestoneController->route($action);

class MilestoneController {

    // route us to the appropriate class method for this action
    public function route($action) {
        switch($action) {
            case 'POST':
                $this->post();
                break;
            case 'GET':
                $this->get();
                break;
        }
    }

    public function post() {
        $milestone = new Milestone();

        $milestone->year = $_POST['year'];
        $milestone->era = $_POST['era'];
        $milestone->title = $_POST['title'];
        $milestone->description = $_POST['description'];
        $milestone->alignment = $_POST['alignment'];
        $milestone->familyMemberId = $_POST['familyMemberId'];
        
        $milestoneQueryFactory = new MilestoneQueryFactory();
        $milestoneQueryFactory->save($milestone);

        header('Location: '.BASE_URL.'/FamilyMember/index/');
        exit();
    }

    public function get() {
        $familyMemberId = $_GET['familyMemberId'];

        $milestoneQueryFactory = new MilestoneQueryFactory();
        $milestones = $milestoneQueryFactory->get(0, $familyMemberId);

        header('Content-Type: application/json');
        echo json_encode($milestones);
    }
}