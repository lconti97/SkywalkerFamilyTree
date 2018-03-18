<?php

include_once '../Common/global.php';
include_once '../FamilyMember/FamilyMemberQueryFactory.php';
include_once '../FamilyMember/FamilyMember.php';

// get the identifier for the page we want to load
$action = $_SERVER['REQUEST_METHOD'];

$familyMemberController = new FamilyMemberController();
$familyMemberController->route($action);

class FamilyMemberController
{
    // route us to the appropriate class method for this action
    public function route($action)
    {
        switch ($action) {
            case 'POST':
                $this->post();
                break;
            case 'index':
                $this->index();
                break;
            case 'addProcess':
                $this->addProcess();
                break;
        }
    }

    public function index()
    {
        $pageTitle = 'Family Tree';
        include_once SYSTEM_PATH . '/Navigation/header.html';
        include_once SYSTEM_PATH . '/FamilyMember/index.html';
        include_once SYSTEM_PATH . '/Navigation/footer.html';
    }

    public function post()
    {
        $familyMember = new FamilyMember();

        $familyMember->firstName = $_POST['firstName'];
        $familyMember->lastName = $_POST['lastName'];
        $familyMember->birthYear = $_POST['birthYear'];
        $familyMember->birthEra = $_POST['birthEra'];
        $familyMember->deathYear = $_POST['deathYear'];
        $familyMember->deathEra = $_POST['deathEra'];

        $familyMemberQueryFactory = new FamilyMemberQueryFactory();
        $familyMemberQueryFactory->post($familyMember);
    }

    public function addProcess()
    {
        $title = $_POST['title'];
        echo($title);
    }
}
