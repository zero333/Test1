<?php

class Createpage extends Controller {

     function __construct() {
          parent::__construct();
          Session::Init();
          if (Session::Get('id') === NULL) {
               Session::Destroy();
               header('Location: ' . URL . 'index');
               exit();
          }
     }
     
     public function Index() {
          $pagename = !empty($_POST['pagename']) ? $_POST['pagename'] : NULL;
          $pagetitle = !empty($_POST['pagetitle']) ? $_POST['pagetitle'] : NULL;          
          echo $pagename, ' ', $pagetitle; 
     }

}
