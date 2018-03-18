<?php

class FamilyMemberQueryFactory {
    const DB_TABLE = 'family_member';

    public function get($id) {
        $databaseManager = DatabaseManager::instance(); // connect to db

        $queryString = sprintf("SELECT * FROM `%s` WHERE id = %d;",
            self::DB_TABLE,
            $id
        );

        $result = $databaseManager->query($queryString);

        if($result->num_rows == 0) {
            return null;
        } else {
            $row = $result->fetch_assoc(); // get results as associative array

            $familyMember = new FamilyMember(); // instantiate new Soldier object

            // store db results in local object
            $familyMember->id = $row['id'];
            $familyMember->name = $row['name'];
            $familyMember->alignment = $row['alignment'];

            return $familyMember; // return the soldier
        }
    }
}