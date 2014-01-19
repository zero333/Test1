<?php

class Index extends Controller {
     
     public function __construct() {
          parent::__construct();
          Session::Init();
          Session::Printr();
          if (Session::Get('id') !== NULL) {
               header('Location: ' . URL . 'user');
               exit();
          }
     }
     
     public function Index() {
          $this->setView();
          $this->view->Render('public/index/index.php', null);
     }
     
     public function Products($id = NULL) {
          echo 'Toote ID: ', $id;
     }
     
}
