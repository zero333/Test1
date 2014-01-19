<?php

class Controller {
   
   protected $view, $model;  
     
   public function __construct() {}
   
   public function setView() {
        if ($this->view === NULL) 
          $this->view = new View();
   }
   
   public function setModel() {
        if ($this->model === NULL) 
          $this->model = new Model();
   }
   
}
