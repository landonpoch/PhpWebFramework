<?php
  require_once('PersonRepository.php');
  
  class UnitOfWork
  {
	  private $logger;
	  private $conn;
	  
	  public function __construct($logger, $ctx) {
		  $this->logger = $logger;
		  $this->conn = $ctx->getConnection();
	  }
	  
	  public function getPersonRepo() {
		  return new PersonRepository($this->logger, $this->conn);
	  }
	  
	  public function commit() {
		  // TODO: commit logic
		  // This will be needed if write queries become necessary
	  }
	  
	  public function dispose() {
		  $this->conn = null;
	  }
  }

?>