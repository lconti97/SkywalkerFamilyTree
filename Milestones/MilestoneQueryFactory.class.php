<?php

include_once('../Database/DatabaseManager.class.php');

class MilestoneQueryFactory {
    const DB_TABLE = 'Milestone';

    public function save($milestone) {
        if($milestone->id == 0) {
          return $this->create($milestone); // Milestone is new and needs to be created
        } else {
          return $this->update($milestone); // Milestone already exists and needs to be updated
        }
    }

    public function create($milestone) {
        $databaseManager = DatabaseManager::instance(); // connect to db
        
        $queryString = sprintf("INSERT INTO `%s` (`year`, `era`, `title`, `description`, `alignment`)
        VALUES (%s, %s, %s, %s, %s);",
          self::DB_TABLE,
          $databaseManager->escape($milestone->year),
          $databaseManager->escape($milestone->era),
          $databaseManager->escape($milestone->title),
          $databaseManager->escape($milestone->description),
          $databaseManager->escape($milestone->alignment)
        );
        
        $databaseManager->query($queryString); // execute query
        $milestone->id = $databaseManager->getInsertID(); // set the ID for the new object
    }

    public function update($milestone) {
        // TODO
    }
}