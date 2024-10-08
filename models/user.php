<?php
class User
{
    private $username;
    private $password;

   public function getter_username(){
    return $this->username;
   }


   public function getter_password(){
    return $this->password;
   }


   public function setter_username($username){
    $this->username =$username;
   }


   public function setter_password($password){
     $this->password = $password;
   }


}
