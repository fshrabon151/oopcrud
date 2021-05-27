<?php


/**
 * User management system 
 */
class Staff extends Database
{


  /**
   * User add to database
   */
  public function createData($name, $email, $cell, $uname, $file_path)
  {

    parent::create("INSERT INTO staffs (name, email, cell, username, photo) VALUES ('$name','$email','$cell','$uname','$file_path')");
  }

  /**
   * All staffs 
   */
  public function viewAll()
  {

    return parent::all('staffs');
  }

  /**
   * Delete User account
   */

  public function deleteData($id)
  {
    parent::delete('staffs', $id);
  }

  /**
   * View data
   */
  public function viewData($id)
  {
    return parent::findOne('staffs', $id);
  }

  /**
   * Update data
   */

  public function updateData($name, $email, $cell, $uname, $newPhoto, $id)
  {
    parent::update("UPDATE staffs SET name = '$name', email = '$email', cell = '$cell', username='$uname', photo = '$newPhoto'WHERE id = '$id'");
  }

  /**
   * Search data
   */

  public function searchData($key)
  {
    return parent::search('staffs', $key);
  }
}
