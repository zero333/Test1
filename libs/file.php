<?php

class zFile {
     
     
     
     public function __construct() {}
     
     public function makeFile($name, $content, $path, $format) {
          $dir_path = $path;
          $ourFileName = $path . $name . "." . $format;
          $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
          $ourFileContent = $content;
          if (fwrite($ourFileHandle, $ourFileContent) === FALSE) {
              echo "Cannot write to file ($filename)";
              exit;
          } else {
               echo 'Fail loodud';
          }
          fclose($ourFileHandle);
     }
     
     public function Test() {
          $newfile = 'newfile';
          $content = '
<?php

     class ' . ucfirst($newfile) . ' extends Controller {

          public function __construct() {
               parent::__construct();
          }
          
          public function Index() {
               echo "Uus leht!!";
          } 

     };';
          $path = 'controller/';
          $format = 'php';
          
          $this->makeFile($newfile, $content, $path, $format);
     }
     
}