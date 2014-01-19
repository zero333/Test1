<?php


class Login extends Controller {

     function __construct() {
          parent::__construct();
          /*$uname = !empty($_POST['uname']) ? $_POST['uname'] : NULL;
          $upass = !empty($_POST['upass']) ? $_POST['upass'] : NULL;
          $token = !empty($_POST['token']) ? $_POST['token'] : NULL; 
          //echo $uname, ' ' ,$upass;
          //echo $token . ' ' . Session::Get('token');
          var_dump(Token::Check($token));
          echo Token::Check($token);
          return false;
          if (Token::Check($token) === TRUE) {
               if (isset($uname, $upass, $token)) {
                    $this->userLogin($uname, $upass, $token);
               }
          } else {
               $this->setView();
               $this->view->setNotification('Sisselogimisel tekkis viga');
               $this->view->Render('public/login/index.php', null);
          } 
          */     
     }
     
     public function Index() {
          $this->setView();
          $this->view->Render('public/login/index.php');
     }
     
     public function userLogin() {
          //echo 'userLogin';
          $uname = !empty($_POST['uname']) ? $_POST['uname'] : NULL;
          $upass = !empty($_POST['upass']) ? $_POST['upass'] : NULL;
          $token = !empty($_POST['token']) ? $_POST['token'] : NULL;
          
          if (file_exists('model/login_model.php')) {
               require_once('model/login_model.php');
               $model = new Login_model();
               $model->Login($uname, $upass, $token);
          } return false;     
     }
     
     public function Loggedin() {
          Session::Init();
          Session::Set('id', 1);
          Session::Set('uid', 56789);
          Session::Set('loggedin', true);
          header('Location: ' . URL . 'user/index/' . Session::Get('uid'));
          exit();
     }

}
