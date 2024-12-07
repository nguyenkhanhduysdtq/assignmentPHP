<?php
include_once("../services/userService.php");
include_once("../models/user.php");
include_once("../services/FieldService.php");

session_start();
ob_start();

if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = new User();
}

class authenController
{
    // injection
    public $userService;
    public $fieldService;


    public function __construct()
    {
        $this->userService = new UserService();
        $this->fieldService = new FieldService();
    }

    // bcrypt password
    function hashPassword($password)
    {
        // Sử dụng PASSWORD_BCRYPT để mã hóa
        return password_hash($password, PASSWORD_BCRYPT);
    }

    //verify password
    function verifyPassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }

    public function login()
    {

        if ($_SESSION["user"]->getter_username() != null) {
            if ($_SESSION["user"]->getter_role() == 1) {
                $listField = $this->fieldService->getAllField();
                return require('../views/homepageAdmin.php');
            }
        }



        if (isset($_POST["submit-login"]) || isset($_SESSION["user"])) {

            if (isset($_POST["submit-login"])) {
                $user = $this->userService->checkUser($_POST["username"], md5($_POST["password"]));
                if ($user->getter_username() == null) {
                    $error = " * Username or password not exist";
                    return require('../views/login.php');
                }
            } else {
                $user = $_SESSION["user"];
            }

            if ($user->getter_username() != null ||  isset($_SESSION["user"])) {
                // $account = new User();
                // $account->setter_id($user->getter_id());
                // $account->setter_username($user->getter_username());
                // $account->setter_name($user->getter_name());
                // $account->setter_fullname($user->getter_fullname());
                // $account->setter_role($user->getter_role());
                // $account->setter_creat_date($user->getter_creat_date());

                // $_SESSION["user"] = $account;

                if (isset($_SESSION["user"])) {
                    $account = new User();
                    $account->setter_id($user->getter_id());
                    $account->setter_username($user->getter_username());
                    $account->setter_name($user->getter_name());
                    $account->setter_fullname($user->getter_fullname());
                    $account->setter_role($user->getter_role());
                    $account->setter_creat_date($user->getter_creat_date());

                    $_SESSION["user"] = $account;
                }




                if ($user->getter_role() == 1) {
                    $listField = $this->fieldService->getAllField();
                    return require('../views/homepageAdmin.php');
                }

                if ($user->getter_role() == 3) {
                    $listField = $this->fieldService->getFieldDetailTeacher($user->getter_id());
                    return require('../views/homepage.php');
                }

                if ($user->getter_role() == 5) {
                    $listField = $this->fieldService->getFieldStatusOn();
                    return require('../views/homepage.php');
                }
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        return require('../views/login.php');
    }


    public function signUp()
    {
        if (isset($_POST["submit-register"])) {
            $check = "";
            $rpassword = $_POST["cfpass"];
            $user = new User();

            $parts = explode(" ", $_POST["fullname"]);
            $name = end($parts);

            $user->setter_fullname($_POST["fullname"]);
            $user->setter_username($_POST["username"]);
            $user->setter_password(md5($_POST["password"]));
            $user->setter_role(5);
            $user->setter_name($name);
            $user->setter_creat_date(date("Y-m-d"));

            $result = $this->userService->signUp($user, md5($rpassword));

            if ($result == 200) {
                $check = "Thành công";
                return require('../views/login.php');
            } else if ($result == 400) {
                $check = "* Tạo không thành công,vui lòng nhập đầy đủ thông tin";
                return require('../views/register.php');
            } else if ($result == 300) {
                $check = "* Tạo không thành công,Mật khẩu xác nhận không trùng nhau";
                return require('../views/register.php');
            }

            if ($result ==  199) {
                $check = "* Username đã tồn tại";
                return require('../views/register.php');
            }
        }
    }
};
