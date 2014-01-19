<?php


    class Session extends Controller {
        
        public function __construct() {
            parent::__construct();
        }
        
        public static function Init() {
            if (!isset($_SESSION))
               @session_start();
        }
        
        public static function Exists($name) {
           self::Init();
           return !empty($_SESSION[$name]) ? $_SESSION[$name] : NULL;
        } 
        
        public static function Set($key, $value) {
            self::Init();
            $_SESSION[$key] = $value;     
        }
        
        public static function Get($key) {
            self::Init(); 
            if (!empty($_SESSION)) {
                    return !empty($_SESSION[$key]) ? $_SESSION[$key] : NULL;
            }
            //print_r($_SESSION);
        }
        
        public static function Delete($name) {
           if (self::Exists($name)) {
              unset($_SESSION[$name]);
           }
        } 
        
        public static function Flash($name, $string = '') {
           if (self::Exists($name)) {
              $session = self::Get($name);
              self::Delete();
              return $session;
           } else {
              self::Set($key, $string);
           }
        }
        
        public static function Printr() {
             print_r($_SESSION);
        }
        
        public static function Destroy() {
            self::Init();
            session_unset();
            session_destroy();
            setcookie(session_name(), '', 0, '/');
            session_regenerate_id(true);
            ob_end_clean();
            header("Location: " . URL . "index");
            exit();
        }
        
                
    }