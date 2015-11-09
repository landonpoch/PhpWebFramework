<?php
  require_once('lib/ChromePhp.php');
  require_once('infrastructure/UnitOfWorkFactory.php');
  require_once('infrastructure/DbContext.php');
  $config = require_once('application/Config.php');
  require_once('application/IndexController.php');

  class Container
  {
	  private $config;
	  
	  public function __construct($config) {
		  $this->config = $config;
	  }
	  
	  public function getIndexController() {
		  $logger = $this->getLogger();
		  $uowFactory = $this->getUowFactory();
		  return new IndexController($logger, $uowFactory);
	  }
	  
	  public function getLogger() {
		  return ChromePhp::getInstance();
	  }
	  
	  private function getUowFactory() {
		  $logger = $this->getLogger();
		  $ctx = new DbContext($logger, $this->config['dbConfig']);
		  return new UnitOfWorkFactory($logger, $ctx);
	  }
  }
  
  return new Container($config);
?>