<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/TasksApi/Models"), $isDevMode);

$conn = array(
  'dbname' => 'tasks',
	'user' => 'root',
	'password' => 'amtmyk26',
	'host' => 'localhost',
	'driver' => 'pdo_mysql'
);

$entityManager = EntityManager::create($conn, $config);