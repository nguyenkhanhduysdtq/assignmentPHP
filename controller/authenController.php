<?php
include_once("../services/userService.php");
include_once("../models/user.php");

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
                $error = " * Username or password not exist";
                return require('../views/login.php');
            }
        }
    }

    public function logout()
    {
        return require('../views/login.php');
    }

    public function signUp()
    {
        if (isset($_POST["submit-register"])) {
            $check = "";
            $rpassword = $_POST["cfpass"];
            $user = new User();

            $user->setter_fullname($_POST["fullname"]);
            $user->setter_username($_POST["username"]);
            $user->setter_password($_POST["password"]);
            $user->setter_role(2);
            $user->setter_creat_date(date("Y-m-d"));



            $result = $this->userService->signUp($user, $rpassword);

            if ($result == 200) {
                $check = "Thành công";
                return require('../views/login.php');
            } else if ($result == 400) {
                $check = "* Tạo không thành công,vui lòng nhập đầy đủ thông tin";
                return require('../views/register.php');
            } else {
                $check = "* Tạo không thành công,Mật khẩu xác nhận không trùng nhau";
                return require('../views/register.php');
            }
        }
    }
};
