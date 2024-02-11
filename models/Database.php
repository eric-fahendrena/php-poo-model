<?php
namespace models;

/**
 * trait Database
 * 
 */
trait Database {
   /**
    * static get PDO
    * 
    * @return  \PDO
    */
   static function getPDO(): \PDO
   {
      $configs = include("configs.php");
      $dbHost = $configs['DB_HOST'];
      $dbName = $configs['DB_NAME'];
      $dbUsername = $configs['DB_USERNAME'];
      $dbPassword = $configs['DB_PASSWORD'];
      try {
         $pdo = new \PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
         ));
         
         return $pdo;
      } catch (\PDOException $e) {
         die("Error : {$e->getMessage()}");
      }
   }
   
   /**
    * Select all from a table
    * 
    * @param   String   $tableName
    * @param   String   precision (optional)
    * @return  array
    */
   static function selectAll(String $tableName, String $prec = 'ORDER BY date')
   {
      $pdo = static::getPDO();
      $req = $pdo->prepare("SELECT * FROM $tableName $prec");
      $req->execute(array());
      
      return $req->fetchAll();
   }
   
   /**
    * public Select
    * 
    * Select an element from table
    * 
    * @param   String   $columns
    * @param   String   $tableName
    * @param   String   $prec precision (optional)
    * @param   String   $conds condition (optional) depends on the value of $prec
    * 
    * @return  mixed   array, void if no element found
    */
   static function select(String $columns, String $tableName, $prec = '', array $conds = [])
   {
      $pdo = static::getPDO();
      $req = $pdo->prepare("SELECT $columns FROM $tableName $prec");
      $req->execute($conds);
      
      return $req->fetch();
   }
}