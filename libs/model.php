<?php

class Model {
     
     protected $_db;
     
     public function __construct() {
          
     }
     
     public function setConnection() {
          if (empty($this->_db)) {
               include_once('config/connect.php');
               $this->_db = $con;
          }
          return false;         
     }
     
}
