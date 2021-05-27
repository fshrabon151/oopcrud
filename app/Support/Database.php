<?php 


/**
 * Data management system 
 */
abstract class Database {

  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $db = 'oop129';
  private $connection;


  /**
   * Database connection 
   */
  private function connection()
  {
     return $this -> connection = new mysqli($this -> host, $this -> user, $this -> pass, $this -> db );
  }


  /**
   * Create data
   */
  protected function create($sql)
  {
    $this -> connection() -> query($sql);
  }



  
  /**
   * All data
   */
  protected function all($table, $order = 'DESC')
  {
    return $this -> connection() -> query("SELECT * FROM $table ORDER by id $order");
  }



  /**
   * Find one data
   */
  protected function findOne($table, $id)
  {
    return $this -> connection() -> query("SELECT * FROM $table WHERE id = '$id'");
  }
  /**
   * Search
   */
  protected function search($table, $key)
  {
    return $this -> connection() -> query("SELECT * FROM $table WHERE name LIKE'%$key%'");
  }


  /**
   * Delete data
   */
  protected function delete($table, $id)
  {
    $this -> connection() -> query("DELETE FROM $table WHERE id = '$id'");
  }


  /**
   * update data
   */
  protected function update($sql)
  {
    $this -> connection() -> query($sql);
  }





  /**
   * Where data
   */
  protected function where()
  {
    # code...
  }

  /**
   * orWhere data
   */
  protected function orWhere()
  {
    # code...
  }
  


}