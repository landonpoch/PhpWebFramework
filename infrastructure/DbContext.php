<?php

  class DbContext
  {
	  private $logger;
	  private $dbConfig;
	  
	  public function __construct($logger, $dbConfig) {
		  $this->logger = $logger;
		  $this->dbConfig = $dbConfig;
	  }
	  
	  public function getConnection() {
		$conf = $this->dbConfig;
		$server = $conf['server'];
		$instance = $conf['instance'];
		$db = $conf['db'];
		$connStr = "sqlsrv:Server=$server\\$instance;Database=$db";

		try {
		  $conn = new PDO($connStr, $conf['username'], $conf['password']);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $this->logger->log("Obtained PDO database connection: $connStr");
		  return $conn;
		}
		catch (Exception $e) {
			$this->logger->error($e->getMessage());
		    throw $e;
			// TODO: find out what the die statement is all about
			// die(print_r($e->getMessage()));
		} 
	  }
  } 

?>