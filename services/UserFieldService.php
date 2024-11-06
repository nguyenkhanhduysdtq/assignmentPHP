<?php
include_once("../repository/userFieldRepository.php");
include_once("../utills/connectDB.PHP");


class UserFieldService implements UserFieldRepositoty
{
    public $connectDB;

    public function __construct()
    {
        $this->connectDB = new connectDB();
    }

    public function insertUserField($user_id, $field_id, $date)
    {

        $conn = $this->connectDB->openConnect();
        $sql = "INSERT INTO user_field (user_id,field_id,assigned_at)
                VALUES('{$user_id}','{$field_id}','{$date}')
        ";


        if ($conn->query($sql) === TRUE) {
            return true;
        }

        return false;
    }

    public function deleteUserField($userField_id)
    {
        $conn = $this->connectDB->openConnect();
        $sql = "DELETE from user_field where id = $userField_id";


        if ($conn->query($sql) === TRUE) {
            return true;
        }

        return false;
    }
}
