<?php
include_once("../services/GroupService.php");
include_once("../models/user.php");
include_once("../models/Group.php");
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


    public function viewAddGroup()
    {
        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }
        return require('../views/addExamGroup.php');
    }


    public function viewAddMajor()
    {
        $listGroup = $this->groupService->getAllGroup();
        $listField = $this->fieldService->getField();
        return require('../views/addMajor.php');
    }

    public function addGroup()
    {

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        $group = new Group();
        $check = false;

        $group->setter_nameGroup(ucfirst($_POST["nameGroup"]));

        $group->setter_subject_one(ucfirst(strtolower($_POST["subjectGroup1"])));
        $group->setter_subject_two(ucfirst(strtolower($_POST["subjectGroup2"])));
        $group->setter_subject_three(ucfirst(strtolower($_POST["subjectGroup3"])));

        if ($this->groupService->checkExistGroup($group->getter_nameGroup()) == true) {
            $title = "Khối này đã tồn tại";
            return require('../views/addExamGroup.php');
        }

        if ($group->getter_nameGroup() == "" || $group->getter_subject_one() == "" || $group->getter_subject_two() == "" || $group->getter_subject_three() == "") {
            $title = "không được để trống ";
            return require('../views/addExamGroup.php');
        } else {
            $title = "Thêm thành công";
            $check = true;
            $checkInsert = $this->groupService->insertGroup($group);
            return require('../views/addExamGroup.php');
        }
    }
}
