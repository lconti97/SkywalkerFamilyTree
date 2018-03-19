<?php

include_once('../Database/DatabaseManager.class.php');

class MilestoneQueryFactory {
    const DB_TABLE = 'milestone';

    public function save($milestone) {
        if($milestone->id == 0) {
            $this->post($milestone); // Milestone is new and needs to be created
        }
    }

    public function get($id = 0, $familyMemberId = 0) {
        $databaseManager = DatabaseManager::instance(); // connect to db

        $queryString = sprintf("SELECT * FROM `%s`", self::DB_TABLE);
        if ($familyMemberId != 0)
            $queryString = $queryString.sprintf(' WHERE `familyMemberId` = %d', $familyMemberId);
        $queryString = $queryString.';';

        $result = $databaseManager->query($queryString);

        $milestones = array();

        while($row = $result->fetch_assoc()) {
            $milestone = new Milestone(); // instantiate new Milestone object

            // store db results in local object
            $milestone->year = $row['year'];
            $milestone->title = $row['title'];
            $milestone->familyMemberId = $row['familyMemberId'];
            $milestone->era = $row['era'];
            $milestone->description = $row['description'];
            $milestone->alignment = $row['alignment'];

            $milestones[] = $milestone; // add the milestone to the array
        }

        return $milestones;
    }

    public function post($milestone) {
        $databaseManager = DatabaseManager::instance(); // connect to db
        
        $queryString = sprintf("INSERT INTO `%s` (`year`, `era`, `title`, `description`, `alignment`, `familyMemberId`)
        VALUES (%s, %s, %s, %s, %s, %s);",
          self::DB_TABLE,
          $databaseManager->escape($milestone->year),
          $databaseManager->escape($milestone->era),
          $databaseManager->escape($milestone->title),
          $databaseManager->escape($milestone->description),
          $databaseManager->escape($milestone->alignment),
          $databaseManager->escape($milestone->familyMemberId)
        );

        $databaseManager->query($queryString); // execute query
        $milestone->id = $databaseManager->getInsertID(); // set the ID for the new object
    }
}