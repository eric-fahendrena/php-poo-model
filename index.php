<?php

$configs = include("configs.php");
if ($configs['PHP_DEBUG']) {
   ini_set('display_errors', 1);
   ini_set('display_setup_errors', 1);
   error_reporting(E_ALL);
}

require_once("autoload.php");

use routes\PagesRouter;

class EntryPoint
{
   function __construct()
   {
      new PagesRouter();
   }
}

new EntryPoint();