<?php
namespace models;

/**
 * abstract models
 * 
 */
abstract class Model {
   use Database;
   
   /**
    * static getAll
    * 
    * Get all element from a table
    * 
    * @param   String   precisions (order and limit)
    * @return  array
    */
   abstract static public function getAll(String $prec='ORDER BY ID'): array;
   /**
    * get
    * 
    * Get a selected element from table
    * 
    * @return  mixed   array or void
    */
   abstract public function get();
}