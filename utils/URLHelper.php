<?php
namespace utils;

final class URLHelper
{
   /**
    * Get Url Base
    * 
    * @return   String
    */
   static public function getBase(): String
   {
      $configs = include("configs.php");
      return "{$configs['URL_SHEME']}://{$_SERVER['HTTP_HOST']}";
   }
}