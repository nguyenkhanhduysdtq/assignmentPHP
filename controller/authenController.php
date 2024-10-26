<?php
include_once("../services/userService.php");

class authenController
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
                return require('../views/homepage.php');
            } else {
                $error = "Username or password not exist";
                return require('../views/login.php');
            }
        }
    }

    public function logout()
    {
        return require('../views/login.php');
    }
};

// $method = $_REQUEST["action"];

// $cLogin = new authenController();
// $cLogin->$method();
