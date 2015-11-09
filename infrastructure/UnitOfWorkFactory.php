<?php
  require_once('DbContext.php');
  require_once('UnitOfWork.php');

  class UnitOfWorkFactory
  {
	  private $logger;
	  private $ctx;
	  
	  public function __construct($logger, $ctx) {
		  $this->logger = $logger;
		  $this->ctx = $ctx;
	  }
	  
	  public function getUnitOfWork($command) {
		  $unit = new UnitOfWork($this->logger, $this->ctx);
		  $returnVal = $command($unit); // TODO: seems like a hack but this might be SOP in dynamic language, investigate.
		  $unit->dispose();
		  $unit = null;
		  return $returnVal;
	  }
  }

?>