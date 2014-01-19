<?php

class Token {

     function __construct() {}
     
     public static function Generate() {
          //Session::Destroy();
          $unique = Hash::Unique();
          $hash = Hash::SHA256($unique);
          //echo $unique, '  ', $hash;
          Session::Set('token', $hash);
          return Session::Get('token');

     }
     
     public static function Check($token) {
          echo $token;
          if ($token === Session::Get('token')) {
               Session::Delete($token);     
               return TRUE;
               
          } return FALSE;            
    
     }

}

