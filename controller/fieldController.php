<?php
include_once("../services/FieldService.php");
include_once("../models/user.php");
include_once("../models/Field.php");

session_start();
ob_start();



class fieldController
{

    public $fieldService;

    public function __construct()
    {
        $this->fieldService = new FieldService();
    }


    public function addField()
    {

        if (isset($_POST["submitAddField"])) {
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
                $listField = $this->fieldService->getAllField();
                return require('../views/homepageAdmin.php');
            } else {
                header("Location: ../views/login.php");
            }
        }
    }

    public function deleteField()
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
    }
}
