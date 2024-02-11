<?php

namespace routes;

use utils\URLHelper;

class Route {
   
   static private $_usedURIs = array();
   
   /**
    * static public add route
    * 
    * @param   string , request uri
    * @param   callable
    * @param   array , argument to set as $_GET key
    */
   static public function add(string $req, $callback, array $argsGET = [])
   {
      $currReqURI = preg_match('#^/#', $_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/' .$_SERVER['REQUEST_URI'];
      $currReqURI = preg_replace('#=([a-z0-9_+-]+)#i', '={}', $currReqURI);
      
      $args = array( );
      foreach ($argsGET as $argGET) {
         if (isset($_GET[$argGET])) {
            $args[] = htmlspecialchars($_GET[$argGET]);
         }
      }
      
      if ($req == $currReqURI) {
         call_user_func_array($callback, $args);
      }
      Route::$_usedURIs[] = $req;
   }
   
   static public function getUsedURIs(): array
   {
      return Route::$_usedURIs;
   }
   
   static public function addDefault($callback, array $argsGET = [])
   {
      $args = array();
      $currReqURI = preg_match('#^/#', $_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/' .$_SERVER['REQUEST_URI'];
      $currReqURI = preg_replace('#=([a-z0-9_+-]+)#i', '={}', $currReqURI);
      
      foreach ($argsGET as $argGET) {
         if (isset($_GET[$argGET])) {
            $args[] = $_GET[$argGET];
         }
      }
      
      if (!in_array($currReqURI, Route::$_usedURIs)) {
         call_user_func_array($callback, $args);
      }
   }
}