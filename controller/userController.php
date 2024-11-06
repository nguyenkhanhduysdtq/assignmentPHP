<?php
include_once("../models/user.php");
include_once("../services/UserService.php");
include_once("../models/Field.php");
include_once("../services/FieldService.php");
include_once("../services/UserFieldService.php");

session_start();

class userController
{
    public $userService;
    public $fieldService;
    public $userfieldService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->fieldService = new FieldService();
        $this->userfieldService = new UserFieldService();
    }

    public function getAccount()
    {
        $listUser = $this->userService->getAccountTeacher();
        return require('../views/accountViews.php');
    }


    public function detailAccount()
    {
        $id = 0;

        if (isset($_POST["submit"])) {
            $id = $_POST["submit"];
        }

        if ($id != 0) {
            $user = $this->userService->getOneUser($id);
            $listField = $this->fieldService->getFieldNotAssigned($user->getter_username());
            $listAssignField = $this->userService->getAssignUserAcceptField($user->getter_username());
            return require('../views/accountDetail.php');
        } else {
            $this->getAccount();
        }
    }

    //function utill load data
    public function loadInforUserField($userId)
    {
        $user = $this->userService->getOneUser($userId);
        $listField = $this->fieldService->getFieldNotAssigned($user->getter_username());
        $listAssignField = $this->userService->getAssignUserAcceptField($user->getter_username());
        return require('../views/accountDetail.php');
    }


    public function assignTeacher()
    {

        $userId = $_POST["valueUser"];

        if (isset($_POST["submit"])) {
            $check = false;
            $userId = $_POST["submit"];
            $fieldId = $_POST["field_id"];
            $check = $this->userfieldService->insertUserField($userId, $fieldId, date('Y-m-d'));
            $this->loadInforUserField($userId);
        }

        if (isset($_POST["submitDelete"])) {
            $userFieldId = $_POST["submitDelete"];
            $check = $this->userfieldService->deleteUserField($userFieldId);
            $this->loadInforUserField($userId);
        }
    }
}
