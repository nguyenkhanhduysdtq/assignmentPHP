<?php
include_once("../services/GroupService.php");
include_once("../models/user.php");
include_once("../services/FieldService.php");
include_once("../services/UploadFileService.php");
include_once("../services/FileService.php");
include_once("../models/fileProfile.php");
include_once("../models/UploadFile.php");
include_once("../services/UserService.php");


session_start();


class fileController
{
    // injection
    public $groupService;
    public $fieldService;
    public $fileService;
    public $uploadFileService;
    public $userService;


    public function __construct()
    {
        $this->groupService = new GroupService();
        $this->fieldService = new FieldService();
        $this->fileService = new FileService();
        $this->uploadFileService = new UploadFileService();
        $this->userService = new UserService();
    }


    public function getfileOfField()
    {


        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        //page teacher 
        if (isset($_POST["submit"]) || $_SESSION["user"]->getter_role() == 3) {
            $fieldId = $_POST["value_id"];
            $fildeDetail = $this->fileService->getFileDetailField($fieldId);
            $userAccept = $_SESSION["user"]->getter_fullname();
            $user = $this->userService->getInforUserAcceptField($fieldId);
            if ($fildeDetail == []) {
                $title = "Chưa có hồ sơ ";
            }
            return require('../views/detailFile.php');
        }

        //page student 
        if (isset($_POST["submit_t"]) || $_SESSION["user"]->getter_role() == 5) {
            $fieldId = $_POST["value_id"];
            $userId = $_SESSION["user"]->getter_id();

            if ($this->fileService->checkUserAndFieldExist($fieldId, $userId) == true) {
                $field = $this->fieldService->getFieldEdit($fieldId);
                return require('../views/detailFileStudent.php');
            } else {
                $field = $this->fieldService->getFieldEdit($fieldId);
                $fildeDetail = $this->fileService->getInforDetail($userId, $fieldId);
                $user = $this->userService->getInforUserAcceptField($fieldId);
                return require('../views/detailFileSubmit.php');
            }
        }
    }


    public function handleFile($fieldId, $fileUpload)
    {

        $uploadFile = new UploadFile();

        $uploadDir = '../utills/upload/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $file = $fileUpload;
        $fileName = basename($file['name']); // Tên file gốc
        $filePath = $uploadDir . $fileName;  // Đường dẫn lưu file
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION)); // Loại file
        $fileSize = $file['size']; // Kích thước file

        // Kiểm tra loại file và kích thước file
        $allowedTypes = ['jpg', 'png'];
        $maxFileSize = 100 * 1024 * 1024; // 100MB

        if (!in_array($fileType, $allowedTypes)) {
            return false;
        } elseif ($fileSize > $maxFileSize) {
            return false;
        } else {
            // Di chuyển file đến thư mục 'uploads'
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $uploadFile->setter_filePath($filePath);
                $uploadFile->setter_fileType($fileType);
                $uploadFile->setter_fileSize($fileSize);
                $uploadFile->setter_uploaded_at(date("Y-m-d"));
                $uploadFile->setter_file_id($fieldId);
            } else {
                return false;
            }
        }

        return $uploadFile;
    }

    public function generateUUIDSimple()
    {
        // Tạo UUID bằng cách kết hợp uniqid và mt_rand
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000, // Phiên bản 4
            mt_rand(0, 0x3fff) | 0x8000, // Biến thể
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }




    public function uploadFile()
    {

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        if (isset($_POST["submit"])) {

            $id = $this->generateUUIDSimple();
            $check = false;
            $fieldId = $_POST["value_id"];
            $userId = $_SESSION["user"]->getter_id();
            $one_score = $_POST["one_score"];
            $two_score = $_POST["two_score"];
            $three_score = $_POST["three_score"];
            $status = 0;

            $fileUpload =  $_FILES['file'];

            $file = new FileProfile();
            $file->setter_id($id);
            $file->setter_field($fieldId);
            $file->setter_user($userId);
            $file->setter_score_subject_one($one_score);
            $file->setter_score_subject_two($two_score);
            $file->setter_score_subject_three($three_score);
            $file->setter_status($status);

            $checkInsertScore = false;

            $checkInsertUploadFile = false;

            $uploadFile = new UploadFile();


            if ($one_score != "" && $two_score != "" && $three_score != "" &&  $fileUpload != "") {
                $uploadFile = $this->handleFile($file->getter_id(),  $fileUpload);
                if ($uploadFile == false) {
                    $field = $this->fieldService->getFieldEdit($fieldId);
                    return require('../views/detailFileStudent.php');
                } else {
                    $checkInsertScore = $this->fileService->insertFile($file);
                    $checkInsertUploadFile = $this->uploadFileService->insertInforFile($uploadFile);
                }
            }



            if ($checkInsertScore == true && $checkInsertUploadFile == true) {
                $check = true;
                $fileDetail = $this->fileService->getInforDetail($userId, $fieldId);
                return require('../views/viewDetailInforStudent.php');
            } else {

                $field = $this->fieldService->getFieldEdit($fieldId);
                return require('../views/detailFileStudent.php');
            }
        }
    }

    public function fileDetail()
    {

        //revised
        if (!isset($_SESSION["user"])) {
            return require('../views/login.php');
        }

        if (isset($_POST["submit_st"])) {
            $userId = $_SESSION["user"]->getter_id();
            $fieldId = $_POST["value_id"];
            $fileDetail = $this->fileService->getInforDetail($userId, $fieldId);
            return require('../views/viewDetailInforStudent.php');
        }

        if (isset($_POST["submit_tc"])) {
            $fieldId = $_POST["value_id"];
            $userId = $_POST["value_user_id"];
            $fileDetail = $this->fileService->getInforDetail($userId, $fieldId);
            return require('../views/viewDetailInforStudent.php');
        }

        if (isset($_POST["activeAcceptFile"])) {
            $status = $_POST["activeAcceptFile"];
            $fieldId = $_POST["value_id"];
            $userId = $_POST["value_user_id"];
            $fileId = $_POST["value_file_id"];
            $user = $this->userService->getInforUserAcceptField($fieldId);
            $userAccept = $_SESSION["user"]->getter_fullname();
            $check = $this->fileService->updateStatusFile($userId, $fieldId, $status, $fileId);
            $fildeDetail = $this->fileService->getFileDetailField($fieldId);
            if ($check == true) {
                return require('../views/detailFile.php');
            }
        }
    }


    public function getAllFile()
    {
        $check = false;
        $listFileApply = [];
        $userId = $_SESSION["user"]->getter_id();


        $listFileApply = $this->fileService->getInforFileApply($userId);

        if ($listFileApply == []) {
            $check = true;
            $title = "Chưa có thông tin";
        }

        return require('../views/allFileApply.php');
    }
}
