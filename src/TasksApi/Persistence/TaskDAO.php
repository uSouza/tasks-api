<?php

namespace TasksApi\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use TasksApi\Persistence\AbstractDAO;
use TasksApi\Models\Task;

class TaskDAO extends AbstractDAO
{
  public function __construct() {
    parent::__construct('TasksApi\Models\Task');
  }
}