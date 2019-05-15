<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use TasksApi\Models\Task;
use TasksApi\Controllers\TasksController;

$app = new \Slim\Slim();

$taskController = new TasksController();

$app->get('/', function() {
	echo json_encode([
		"api" => "Tasks Manager",
		"version" => "1.0.0"
	]);
});

$app->get('/tasks(/)', function() use($taskController) {
  echo json_encode($taskController->getAll());
});

$app->get('/tasks(/(:id))', function($id = null) use ($taskController) {
  echo json_encode($taskController->getById($id));
});

$app->post('/tasks(/)', function() use ($taskController) {
  $app = \Slim\Slim::getInstance();
  $json = json_decode($app->request()->getBody());
  echo json_encode($taskController->insert($json));
});

$app->put('/tasks(/(:id))', function($id = null) use ($taskController) {
  $app = \Slim\Slim::getInstance();
  $json = json_decode($app->request()->getBody());
  echo json_encode($taskController->update($id, $json));
});

$app->delete('/tasks(/(:id))', function($id = null) use ($taskController) {
  echo json_encode($taskController->delete($id));
});

$app->run();

?>