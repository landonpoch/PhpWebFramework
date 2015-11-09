<?php

  class IndexController
  {
	  private $logger;
	  private $uowFactory;
	  
	  public function __construct($logger, $uowFactory) {
		$this->logger = $logger;
		$this->uowFactory = $uowFactory;
		
		// Logging example:
	    // $logger = $container->getLogger();
	    // $logger->group('test');
	    // $logger->info('info');
	    // $logger->log('log');
	    // $logger->warn('warn');
	    // $logger->error('error');
	    // $logger->groupEnd();
	  }
	  
	  public function index() {
		return $this->uowFactory->getUnitOfWork(function($uow) {
		  $repo = $uow->getPersonRepo();
		  
		  // also supports getting by id
		  // $person = $repo->getById(1);
		  
		  return $repo->getAll();
		});
	  }
  }

?>