<?php
include_once("repository/UserRepository.php");
include_once("models/user.php");

class UserService implements userRepositoty
{

    public function checkUser($username, $password)
    {
        $user = new User();

        $user->setter_username($username);
        $user->setter_password($password);

        return $user;
    }
}
