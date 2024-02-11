<?php
class Autoload {
   
   public function __construct()
   {
      spl_autoload_register(function ($class) {
         $file = preg_replace("#\\\#", DIRECTORY_SEPARATOR, "$class.php");
         if (file_exists($file)) {
            include $file;
         }
      });
   }
}

new Autoload();
