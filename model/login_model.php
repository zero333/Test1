<?php

class Login_model extends Model {
     
     public function __construct() {
          parent::__construct();
          //echo 12;
     }
     
     public function Login($uname, $upass, $token) {
          
          $this->setConnection();
          $uname = trim($uname, " ");
          $pass = Hash::SHA256($upass);
          $sql = $this->_db->prepare("SELECT COUNT(mvc.users.id), mvc.users.id, mvc.client_type.permissions 
                          FROM mvc.users, mvc.client_type WHERE login = ? AND password = ? LIMIT 1");
          $sql->bind_param("ss", $uname, $pass);
          $sql->bind_result($count_id, $id, $permission);
          $sql->execute();
          $sql->fetch();
          if ( $count_id > 0 ) {
             //login
             ini_set('session.cookie_httponly', true);
             Session::Init();
             if ( Session::Get('last_ip') === false ) {
                Session::Set('last_ip', $_SERVER['REMOTE_ADDR']);
             }
             Session::Set('id', $id);
             //Session::Set('uid', $uid);
             Session::Set('permission', $permission);
             Session::Set('loggedin', true);
             Session::Delete('token');  
             if ( Session::Get('id') !== NULL && Session::Get('permission') !== NULL && Session::Get('loggedin') === true ) {
                echo "loggedin";
                header('Location: ' . URL . 'user');
                exit();
             } else {
                Session::Destroy();
             }
          } else {
             $view = new View();
             $view->setNotification('Vale kasutajatunnus või parool');
             $view->Render('public/login/index.php', null);
             //$this->_msg = "Vale kasutajatunnus või parool";
             //echo "Vale kasutajatunnus või parool";
          }
     }   

     
}
