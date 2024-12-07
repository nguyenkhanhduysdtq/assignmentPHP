<?php
include_once("../repository/UploadFileRepository.php");
include_once("../utills/connectDB.PHP");
include_once("../models/FileProfile.php");

class UploadFileService implements UploadFileRepository
{
    public $connectDB;

    public function __construct()
    {
        $this->connectDB = new connectDB();
    }

    public function insertInforFile($uploadFile)
    {
        $conn = $this->connectDB->openConnect();
        $sql = "INSERT INTO uploaded_files (filee_path,file_type,file_size,uploaded_at,file_id)
                VALUES('{$uploadFile->getter_filePath()}','{$uploadFile->getter_fileType()}','{$uploadFile->getter_fileSize()}',
                '{$uploadFile->getter_uploaded_at()}','{$uploadFile->getter_file_id()}')
        ";


        if ($conn->query($sql) === TRUE ) {
            return true;
        }

        return false;
    }
}
