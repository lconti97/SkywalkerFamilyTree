<?php

class DatabaseManager {

  private static $_instance = null;
  private $connection;

	private function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE)
                or die('Error: '.$connection->connect_error);
	}

	public static function instance() {
		if (self::$_instance === null) {
			self::$_instance = new DatabaseManager();
		}
		return self::$_instance;
	}

  public function query($queryString) {
    $result = $this->conn->query($queryString);
    return $result;
  }

  // escape any characters that could cause trouble for MySQL
  public function escape($string) {
    if($string == '') {
      $escaped = 'NULL';
    } elseif(is_numeric($string)) {
      $escaped = $this->conn->real_escape_string($string);
    } else {
      $escaped = "'".$this->conn->real_escape_string($string)."'";
    }
    return $escaped;
  }

  // get the ID of the last inserted object
  public function getInsertID() {
    return $this->conn->insert_id;
  }

  // format any date as a MYSQL date
  public function formatDate($date) {
    $time = strtotime($date);
    $formattedDate = date("Y-m-d", $time);
    return $formattedDate;
  }
}