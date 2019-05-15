<?php

namespace TasksApi\Models;

class Tasks
{
  private $id;
  private $title;
  private $description;
  private $priority;

  public function __construct($id = 0, $title= "", $description= "", $priority = 0) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->priority = $priority;
  }

  public static function construct($array) {
    $obj = new Tasks();
    $obj->setId( $array['id']);
    $obj->setTitle( $array['title']);
    $obj->setDescription( $array['description']);
    $obj->setPriority( $array['priority']);
    return $obj;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title=$title;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description=$description;
  }

  public function getPriority() {
    return $this->priority;
  }

  public function setPriority($priority) {
    $this->priority=$priority;
  }

  public function equals($object) {
    
    if($object instanceof Tasks) {

      if($this->id != $object->id) {
        return false;
      }

      if($this->title != $object->title) {
        return false;
      }

      if($this->description != $object->description) {
        return false;
      }

      if($this->priority != $object->priority) {
        return false;
      }
      return true;
    } else {
      return false;
    }
  }
  public function toString() {
    return "  [id:" .$this->id. "]  [title:" .$this->title. "]  [description:" .$this->description. "]  [priority:" .$this->priority. "]  ";
  }

}