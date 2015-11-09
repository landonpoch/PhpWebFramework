<?php
  require_once('../domain/Person.php');

  class PersonRepository
  {
	  private $logger;
	  private $conn;
	  
	  public function __construct($logger, $conn) {
		  $this->logger = $logger;
		  $this->conn = $conn;
	  }
	  
	  public function getById($id) {
		  $stmt = $this->conn->prepare('select * from person where Id = ?');
		  $stmt->execute(array($id));
		  $record = $stmt->fetch();
		  return $this->Map($record);
	  }
	  
	  public function getAll() {
		  $query = $this->conn->query('select * from person');
		  $records = $query->fetchall();
		  $people = array();
		  foreach ($records as $record)
			array_push($people, $this->Map($record));
		  return $people;
	  }
	  
	  private function Map($record) {
		  $person = new Person();
		  $person->id = $record['Id'];
		  $person->firstName = $record['FirstName'];
		  $person->lastName = $record['LastName'];
		  return $person;
	  }
  }

?>