<?php

class Bootstrap {
     
     protected $_structure = array('controller', 'model', 'libs', 'public');
     
     public function __construct() {
          $url = isset($_GET['url']) ? $_GET['url'] : NULL;
          //echo $url;
          $url = explode('/', $url);
          //echo '<pre>', print_r($url), '</pre>';
          
          if (empty($url[0])) {
               require_once($this->_structure[0] . '/index.php');
               $controller = new Index();
               $controller->Index();
               return FALSE;
          }
          if (empty($url[1])) {
               if (file_exists($this->_structure[0] . '/' . $url[0] . '.php')) {
                    require_once($this->_structure[0] . '/' . $url[0] . '.php');
                    $controller = new $url[0];
                    $controller->Index();
               }
          } else {
               require_once($this->_structure[0] . '/' . $url[0] . '.php');
               $controller = new $url[0];
               if (method_exists($controller, $url[1])) {
                    if (isset($url[2])) {
                         $redirect = empty($url[2]) ? TRUE : FALSE; 
                         $controller->{$url[1]}($url[2], $redirect);
                    } else {
                         if (isset($url[1])) {
                              $controller->{$url[1]}();
                         }
                    } 
               } else {
                    $view = new View();
                    $view->Render($this->_structure[3] . '/error/index.php', NULL);
                    return FALSE;                    
               }     
          }      
     }
     
}
