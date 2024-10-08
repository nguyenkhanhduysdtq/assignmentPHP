<?php
include_once("services/userService.php");

class loginController
{

    // injection
    public $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function login()
    {
        $user = $this->userService->checkUser($_POST["username"], $_POST["password"]);
        include('views/homepage.php');
    }
}