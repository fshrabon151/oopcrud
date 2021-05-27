<?php


/**
 * User management system 
 */
class User extends Database
{


  /**
   * User add to database
   */
  public function createData($name, $email, $cell, $uname, $file_path)
  {

    parent::create("INSERT INTO users (name, email, cell, username, photo) VALUES ('$name','$email','$cell','$uname','$file_path')");
  }

  /**
   * All users 
   */
  public function viewAll()
  {

    return parent::all('users');
  }

  /**
   * Delete User account
   */

  public function deleteData($id)
  {
    parent::delete('users', $id);
  }

  /**
   * View data
   */
  public function viewData($id)
  {
    return parent::findOne('users', $id);
  }

  /**
   * Update data
   */

  public function updateData($name, $email, $cell, $uname, $newPhoto, $id)
  {
    parent::update("UPDATE users SET name = '$name', email = '$email', cell = '$cell', username='$uname', photo = '$newPhoto'WHERE id = '$id'");
  }

  /**
   * Search data
   */

  public function searchData($key)
  {
    return parent::search('users', $key);
  }
}
