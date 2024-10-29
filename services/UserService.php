<?php
include_once("../repository/UserRepository.php");
include_once("../models/user.php");
include_once("../utills/connectDB.PHP");

class UserService implements userRepositoty
{

    public $connectDB;

    public function __construct()
    {
        $this->connectDB = new connectDB();
    }



    public function checkUser($username, $password)
    {
        $user = new User();
        $conn = $this->connectDB->openConnect();

        $sql = "SELECT * FROM user WHERE username='$username' and password ='$password'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $user->setter_username($row["username"]);
                $user->setter_password($row["password"]);
                $user->setter_name($row["name"]);
                $user->setter_fullname($row["fullname"]);
                $user->setter_modified_date($row["modified_date"]);
                $user->setter_creat_date($row["creat_date"]);
                $user->setter_role("2");
            }
        } else {
            return $user;
        }


        return $user;
    }

    public function signUp($user, $cfPassword)
    {
        $userModel = new User();

        $userModel->setter_username($user->getter_username());
        $userModel->setter_password($user->getter_password());
        $userModel->setter_creat_date($user->getter_creat_date());
        $userModel->setter_modified_date($user->getter_modified_date());
        $userModel->setter_name($user->getter_name());
        $userModel->setter_fullname($user->getter_fullname());
        $userModel->setter_role(2);

        $conn = $this->connectDB->openConnect();

        $sql = "INSERT INTO user (username,password,creat_date,modified_date,role,name,fullname)

         VALUES ('{$userModel->getter_username()}', '{$userModel->getter_password()}','{$userModel->getter_creat_date()}',
         '{$userModel->getter_modified_date()}','{$userModel->getter_role()}','{$userModel->getter_name()}','{$userModel->getter_fullname()}'
         )
        ";

        if ($userModel->getter_username() == null) {
            return 400;
        }
        if ($userModel->getter_password() == null) {
            return 400;
        }

        if ($userModel->getter_fullname() == null) {
            return 400;
        }
        if ($userModel->getter_password() == null) {
            return 400;
        }

        if ($user->getter_password() != $cfPassword) {
            return 300;
        }


        if ($conn->query($sql) === true) {
            return 200;
        } else {
            return 400;
        }
    }
}
