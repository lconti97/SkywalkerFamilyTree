<?php

include_once('../Database/DatabaseManager.class.php');
include_once('../FamilyMember/FamilyMember.php');

class FamilyMemberQueryFactory
{
    const DB_TABLE = 'family_member';

    public function get($id = 0)
    {
        $databaseManager = DatabaseManager::instance(); // connect to db

        $queryString = sprintf("SELECT * FROM `%s`", self::DB_TABLE);
        if ($id != 0)
            $queryString = $queryString.sprintf(' WHERE `familyMemberId` = %d', $id);
        $queryString = $queryString.';';

        $result = $databaseManager->query($queryString);

        $familyMembers = array();

        while($row = $result->fetch_assoc()) {
            $familyMember = new FamilyMember(); // instantiate new FamilyMember object

            // store db results in local object
            $familyMember->id = $row['id'];
            $familyMember->firstName = $row['firstName'];
            $familyMember->lastName = $row['lastName'];
            $familyMember->birthYear = $row['birthYear'];
            $familyMember->birthEra = $row['birthEra'];
            $familyMember->deathYear = $row['deathYear'];
            $familyMember->deathEra = $row['deathEra'];

            $familyMembers[] = $familyMember; // add the familyMember to the array
        }

        return $familyMembers;
    }

    public function post($familyMember)
    {
        $databaseManager = DatabaseManager::instance(); // connect to db

        $familyMember->id = $databaseManager->getInsertID(); // set the ID for the new object

        $queryString = sprintf("INSERT INTO `%s` (`id`, `firstName`, `lastName`, `birthYear`, `birthEra`, `deathYear`, `deathEra`)
        VALUES (%s, %s, %s, %s, %s, %s, %s);",
            self::DB_TABLE,
            $databaseManager->escape($familyMember->id),
            $databaseManager->escape($familyMember->firstName),
            $databaseManager->escape($familyMember->lastName),
            $databaseManager->escape($familyMember->birthYear),
            $databaseManager->escape($familyMember->birthEra),
            $databaseManager->escape($familyMember->deathYear),
            $databaseManager->escape($familyMember->deathEra)
        );

        echo $queryString;
        $databaseManager->query($queryString); // execute query

        header('Location: '.BASE_URL.'/FamilyMember/view/');
        exit();
    }
}