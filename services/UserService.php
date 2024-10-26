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
}
