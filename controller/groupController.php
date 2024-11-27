<?php
include_once("../services/GroupService.php");
include_once("../models/user.php");
include_once("../services/FieldService.php");


session_start();


class groupController
{
    // injection
    public $groupService;
    public $fieldService;


    public function __construct()
    {
        $this->groupService = new GroupService();
        $this->fieldService = new FieldService();
    }


    public function getGroup()
    {


        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        $listGroup = $this->groupService->getAllGroup();
        $listField = $this->fieldService->getFieldStatusoff();
        $userOnline = $_SESSION["user"];

        return require('../views/formAddField.php');
    }
}
