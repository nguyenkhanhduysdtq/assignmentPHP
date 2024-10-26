<?php
class User
{
  private $id;
  private $username;
  private $password;
  private $role;
  private $name;
  private $fullname;
  private $creat_date;
  private $modified_date;


  public function getter_id()
  {
    return $this->id;
  }


  public function setter_id($id)
  {
    $this->id = $id;
  }

  public function getter_name()
  {
    return $this->name;
  }


  public function setter_name($name)
  {
    $this->name = $name;
  }

  public function getter_fullname()
  {
    return $this->fullname;
  }


  public function setter_fullname($fullname)
  {
    $this->fullname = $fullname;
  }

  public function getter_creat_date()
  {
    return $this->creat_date;
  }


  public function setter_creat_date($creat_date)
  {
    $this->creat_date = $creat_date;
  }

  public function getter_modified_date()
  {
    return $this->modified_date;
  }


  public function setter_modified_date($modified_date)
  {
    $this->modified_date = $modified_date;
  }




  public function getter_username()
  {
    return $this->username;
  }


  public function getter_password()
  {
    return $this->password;
  }


  public function setter_username($username)
  {
    $this->username = $username;
  }


  public function setter_password($password)
  {
    $this->password = $password;
  }

  public function getter_role()
  {
    return $this->role;
  }


  public function setter_role($role)
  {
    $this->role = $role;
  }
}
