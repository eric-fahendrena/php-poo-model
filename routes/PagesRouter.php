<?php
namespace routes;

use routes\Route;
// use controllers\Controller;

class PagesRouter {
   
   public function __construct()
   {
      $configs = include('configs.php');
      
      /**
      
      Examples :
       
      $controller = new Controller();
      
      Route::add($configs['PARENT_DIR'] . "/", [$controller, "ctrlMethod"]);
      
      Route::addDefault([$controller, "ctrlMethod"]);
      
      **/
   }
}