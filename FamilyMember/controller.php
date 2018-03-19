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
            case 'GET':
                $this->get();
                break;
            case 'DELETE':
                $this->delete();
                break;
        }
    }

    public function get()
    {
        $familyMemberQueryFactory = new FamilyMemberQueryFactory();
        $familyMembers = $familyMemberQueryFactory->get();

        header('Content-Type: application/json');
        if (count($familyMembers) == 1)
            echo json_encode($familyMembers[0]);
        else
            echo json_encode($familyMembers);
    }

    public function post()
    {
        $familyMember = new FamilyMember();

        $updateExistingRecord = array_key_exists('id', $_POST); //if an id is provided, the user intends to update an existing record
        if ($updateExistingRecord)
            $familyMember->id = $_POST['id'];

        $familyMember->firstName = $_POST['firstName'];
        $familyMember->lastName = $_POST['lastName'];
        $familyMember->birthYear = $_POST['birthYear'];
        $familyMember->birthEra = $_POST['birthEra'];
        $familyMember->deathYear = $_POST['deathYear'];
        $familyMember->deathEra = $_POST['deathEra'];

        $familyMemberQueryFactory = new FamilyMemberQueryFactory();

        if ($updateExistingRecord)
            $familyMemberQueryFactory->put($familyMember);
        else
            $familyMemberQueryFactory->post($familyMember);
    }

    public function delete() {
        // Set up DELETE variables
        parse_str(file_get_contents('php://input'), $_DELETE);

        $id = $_DELETE['id'];
        $familyMemberQueryFactory = new FamilyMemberQueryFactory();
        $familyMemberQueryFactory->delete($id);
    }
}
