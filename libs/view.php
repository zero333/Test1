<?php

class View extends Controller {

     protected $_msg, $_notification = NULL, $_show;
     
     public function __construct() {
          parent::__construct();
     }
     
     public function Render($name, $msg = NULL) {
          $this->_msg = $msg;
          include_once('public/header.php');
          if (file_exists($name)) {
               include_once($name);
          } else {
               include_once('public/error/index.php');
          }
          //echo $msg;
          include_once('public/footer.php');
     }
     
     public function getMsg() {
          return $this->_msg;
     }
     
     public function setNotification($value) {
          $this->_notification = $value;
     }
     
     public function getNotification() {
          return $this->_notification;
     }
     
     public function getShow() {
          return $this->_show;
     }
     
     public function setShow($value) {
          $this->_show = $value;
     }
     
}
