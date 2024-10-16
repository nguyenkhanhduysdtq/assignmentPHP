<?php
include_once("../services/userService.php");

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
        if (isset($_POST["submit-login"])) {
            $user = $this->userService->checkUser($_POST["username"], $_POST["password"]);
            if ($user->getter_username() != null) {
                include('../views/homepage.php');
            } else {
                $error = "Usernam or password not exist";
                include('../views/login.php');
            }
        }
    }
};


$cLogin = new loginController();
$cLogin->login();
