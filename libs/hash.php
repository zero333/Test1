<?php

class Hash {

     public function __construct() {
          parent::__construct();
     }

     public static function SHA256($value) {
          return hash('sha256', $value);
     }

     public static function Make($string, $salt = '') {
          return hash('sha256', $string . $salt);
     }

     public static function Salt($length) {
          return mcrypt_create_iv($length);
     }

     public static function Unique() {
          return self::Make(uniqid());
     }

}
