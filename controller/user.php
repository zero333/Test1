<?php

class User extends Controller {
     
     function __construct() {
          parent::__construct();
          //echo Session::Get('id');
          Session::Init();
          Session::Printr();
          if (Session::Get('id') === NULL) {
               $this->Logout();
               header('Location: ' . URL . 'index');
               exit();
          }
          $this->userNotifications('Edukalt sisse logitud');

     }
     
     public function Index($id = NULL, $redirect = NULL) {
          if ($redirect === true) {
               header("Location: " . URL . "user/index/" . Session::Get('id'));
          }
          $this->setView();
          $this->view->Render('public/user/index.php', '-Uudis 1-<br />-Uudis 2-');
     }
     
     protected function userNotifications($note) {
          $this->setView();
          if ($this->view->getShow() == NULL) {
               $this->view->setNotification($note);
               $this->view->setShow(false);               
          } else {
               $this->view->setNotification(NULL);
          }
     }
     
     public function createPage() {
          $this->setView();
          $this->view->Render('public/user/createpage.php');          
     }
     
     public function Logout() {
          Session::Destroy();
     }
     
    
     
}
