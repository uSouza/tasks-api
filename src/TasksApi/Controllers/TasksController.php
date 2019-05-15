<?php

namespace TasksApi\Controllers;

use TasksApi\Persistence\TaskDAO;
use TasksApi\Models\Task;
use TasksApi\Controllers\AbstractController;

class TasksController extends AbstractController 
{
  public function __construct() 
  {
    parent::__construct(new TaskDAO());
  }

  public function getAll()
  {
    $tasks = $this->getDao()->findAll();
    $tasksToArray = array();
    foreach($tasks as $t) {
      array_push($tasksToArray, $t->toArray());
    }
    return ["data" => $tasksToArray];
  }

  public function getById($id)
  {
    $task = $this->getDao()->findById($id);
    return ["data" => $task->toArray()];
  }
  
  public function insert($json)
  {
    $task = new Task($json->title, $json->description, $json->priority);
    $this->getDao()->insert($task);
    return ["data" => $task->toArray()];
  }
	
  public function update($id, $json)
  {
    $task = $this->getDao()->findById($id);

    if (! empty($json->title)) {
      $task->setTitle($json->title);
    }
    if (! empty($json->description)) {
      $task->setDescription($json->description);
    }
    if (! empty($json->priority)) {
      $task->setPriority($json->priority);
    }

    $this->getDao()->update($task);

    return ["data" => $task->toArray()];
  }
  
  public function delete($id)
  {
    $task = $this->getDao()->findById($id);
    $this->getDao()->delete($task);
    return ["data" => $task->toArray()];
	}
}
