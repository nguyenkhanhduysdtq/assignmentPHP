<?php
class User
{
  private $username;
  private $password;
  private $role;

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
