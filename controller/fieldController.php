<?php
include_once("../services/FieldService.php");
include_once("../models/Field.php");
include_once("../models/user.php");
include_once("../services/GroupService.php");
include_once("../services/FileService.php");
include_once("../services/UserService.php");


session_start();
ob_start();



class fieldController
{

    public $fieldService;
    public $groupService;
    public $fileService;
    public $userService;

    public function __construct()
    {
        $this->fieldService = new FieldService();
        $this->groupService = new GroupService();
        $this->fileService = new FileService();
        $this->userService = new UserService();
    }


    public function addField()
    {


        if (isset($_POST["submitAddField"])) {
            $check = false;
            $id = $_POST["major"];
            $startDate = $_POST["start_date"];
            $endDate = $_POST["end_date"];
            $group = $_POST["group"];
            $status = 0;

            $field = new Field();

            $field->setter_id($id);
            $field->setter_start_time($startDate);
            $field->setter_end_time($endDate);
            $field->setter_group($group);
            $field->setter_status($status);

            $check = $this->fieldService->updateField($field);

            if ($check == true) {
                // $listField = $this->fieldService->getAllField();
                // return require('../views/homepageAdmin.php');

                $listGroup = $this->groupService->getAllGroup();
                $listField = $this->fieldService->getFieldStatusoff();
                $userOnline = $_SESSION["user"];
                $check = true;
                return require('../views/formAddField.php');
            }
        }
    }

    public function dataHomepage()
    {
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        } else {
            if ($_SESSION["user"]->getter_role() == 1) {
                $listField = $this->fieldService->getAllField();
                return require('../views/homepageAdmin.php');
            }
        }
    }

    public function editField()
    {
        if (isset($_POST["delete"])) {
            $id = $_POST["value_id"];

            $check = $this->fieldService->deleteField($id);

            if ($check == true) {
                $listField = $this->fieldService->getAllField();
                $alert = "Xóa thành công";
                return require('../views/homepageAdmin.php');
            } else {
                $alert = "Xóa không thành công";
            }
        }

        if (isset($_POST["edit"])) {
            $id = $_POST["value_id"];
            $field = $this->fieldService->getFieldEdit($id);
            if ($field != null) {
                $listGroup = $this->groupService->getAllGroup();
                return require('../views/editField.php');
            }
        }


        if (isset($_POST["submitDetail"]) || $_SESSION["user"]->getter_role() == 1) {
            $fieldId = $_POST["value_id"];
            $fildeDetail = $this->fileService->getFileDetailField($fieldId);
            $user = $this->userService->getInforUserAcceptField($fieldId);
            return require('../views/detailFile.php');
        }
    }



    public function finalEdit()
    {
        if (isset($_POST["submit_edit"])) {
            $id = $_POST["value_id"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $group = $_POST["group"];
            $status = $_POST["status"];


            $field = new Field();

            $field->setter_id($id);
            $field->setter_start_time($start_date);
            $field->setter_end_time($end_date);
            $field->setter_group($group);
            $field->setter_status($status);

            $check = $this->fieldService->editField($field);

            if ($check == true) {
                $id = $_POST["value_id"];
                $field = $this->fieldService->getFieldEdit($id);
                $listGroup = $this->groupService->getAllGroup();
                return require('../views/editField.php');
                $alert = "Sửa thông tin thành công";
            } else {
                $alert = "Sửa thông tin không thành công";
            }
        }
    }


    public function FieldTeacher()
    {
        $listField = $this->fieldService->getFieldDetailTeacher($_SESSION["user"]->getter_id());
        return require('../views/homepage.php');
    }


    public function FieldStudent()
    {
        $listField = $this->fieldService->getFieldStatusOn();
        return require('../views/homepage.php');
    }
}
