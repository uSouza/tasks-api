<?php

namespace TasksApi\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class AbstractDAO 
{
	public $entityManager;
  private $entityPath;
  
  public function __construct($entityPath) 
  {
		$this->entityPath = $entityPath;
		$this->entityManager = $this->createEntityManager();
  }
  
	public function createEntityManager() {
		$path = array (
		    'TasksApi/Models'
    );
    
		$devMode = true;
    $config = Setup::createAnnotationMetadataConfiguration ($path, $devMode);

    $savedConfigs = parse_ini_file('database.ini');
    
		$connectionOptions =  array (
		    'dbname' => $savedConfigs["database"],
		    'user' => $savedConfigs["username"],
		    'password' => $savedConfigs["password"],
		    'host' => $savedConfigs["host"],
		    'driver' => 'pdo_mysql'
    );
    
		return EntityManager::create ($connectionOptions, $config);
  }
  
  public function insert($obj)
  {
		$this->entityManager->persist($obj);
		$this->entityManager->flush();
  }
  
  public function update($obj)
  {
		$this->entityManager->merge($obj);
		$this->entityManager->flush();
  }
  
  public function delete($obj)
  {
		$this->entityManager->remove($obj);
		$this->entityManager->flush();
  }
  
  public function findById($id)
  {
		return $this->entityManager->find($this->entityPath, $id) ;
  }
  
  public function findAll()
  {
		$collection = $this->entityManager->getRepository ($this->entityPath)->findAll();
		$data = array();
		foreach ($collection as $obj) {
			$data [] = $obj;
		}
		return $data;
  }
  
}
