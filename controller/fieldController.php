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

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

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

            if ($id == "" || $startDate == "" || $endDate == "" ||  $group == "" || $startDate > $endDate) {
                $title = "Không được để trống";
                if ($startDate > $endDate) {
                    $title = "Ngày bắt đầu phải lớn hơn ngày kết thúc";
                }

                $listGroup = $this->groupService->getAllGroup();
                $listField = $this->fieldService->getFieldStatusoff();
                return require('../views/formAddField.php');
            } else {
                $check = $this->fieldService->updateField($field);
            }

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

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

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
            if ($fildeDetail == []) {
                $title = "Chưa có hồ sơ ";
            }
            return require('../views/detailFile.php');
        }
    }



    public function finalEdit()
    {

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }


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

        if (isset($_SESSION["user"])) {
            $listField = $this->fieldService->getFieldDetailTeacher($_SESSION["user"]->getter_id());
            return require('../views/homepage.php');
        } else {
            return require('../views/login.php');
        }
    }


    public function FieldStudent()
    {
        if (isset($_SESSION["user"])) {
            $listField = $this->fieldService->getFieldStatusOn();
            return require('../views/homepage.php');
        } else {
            return require('../views/login.php');
        }
    }


    public function getStatiscalStatus()
    {

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        $listInforField = $this->fieldService->statiscicalStatusOffile();
        return require('../views/statiscicalField.php');
    }

    function validateInput($input)
    {
        // Xóa khoảng trắng thừa đầu và cuối
        $input = trim($input);

        // Kiểm tra xem chuỗi có khoảng cách thừa giữa các từ không (chỉ cho phép 1 khoảng trắng giữa các từ)
        if (preg_match('/\s{2,}/', $input)) {
            return "Chuỗi không được có khoảng cách thừa giữa các từ.";
        }

        // Kiểm tra chuỗi có chứa ký tự không phải chữ cái (ngoài dấu và chữ cái) không
        if (!preg_match('/^[\p{L}\s]+$/u', $input)) {
            return "Chuỗi phải viết có dấu và chỉ chứa chữ cái và khoảng trắng.";
        }


        return 1;
    }


    public function addMajor()
    {

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        if (isset($_POST["submitAddField"])) {
            $check = false;
            $nameMajor = $_POST["nameMajor"];

            $checkValidate = $this->validateInput($nameMajor);

            $group = $_POST["group"];
            $status = 0;

            $field = new Field();

            $field->setter_nameField($nameMajor);
            $field->setter_group($group);
            $field->setter_status($status);

            if ($this->fieldService->getFieldFllowingName($nameMajor) == true) {
                $checkValidate = "Tên ngành đã tồn tại";
            }

            if ($nameMajor != "" && $group != "" && $checkValidate == 1) {
                $check = $this->fieldService->insertField($field);
            }
            $listGroup = $this->groupService->getAllGroup();
            $listField = $this->fieldService->getField();
            $userOnline = $_SESSION["user"];

            if ($check == true) {
                // $listField = $this->fieldService->getAllField();
                // return require('../views/homepageAdmin.php');

                return require('../views/addMajor.php');
            }

            return require('../views/addMajor.php');
        }
    }
}
