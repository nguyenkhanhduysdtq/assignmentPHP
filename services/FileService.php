<?php
include_once("../repository/FileRepository.php");
include_once("../utills/connectDB.PHP");
include_once("../models/FileProfile.php");
include_once("../models/Group.php");

class FileService implements FileRepository
{
    public $connectDB;

    public function __construct()
    {
        $this->connectDB = new connectDB();
    }

    public function insertFile($file)
    {

        $conn = $this->connectDB->openConnect();
        $sql = "INSERT INTO file (id,user_id,field_id,score_subject_one,score_subject_two,score_subject_three,status)
                VALUES('{$file->getter_id()}','{$file->getter_user()}','{$file->getter_field()}','{$file->getter_score_subject_one()}','{$file->getter_score_subject_two()}'
                ,'{$file->getter_score_subject_three()}','{$file->getter_status()}')
        ";


        if ($conn->query($sql) === TRUE) {
            return true;
        }

        return false;
    }


    public function checkUserAndFieldExist($fieldId, $userId)
    {
        $conn = $this->connectDB->openConnect();
        $sql = "SELECT * FROM file where user_id = '{$userId}' AND field_id = '{$fieldId}'";

        $result = $conn->query($sql);
        if ($result->num_rows != 0) {

            return false;
        }

        return true;
    }

    public function getInforDetail($userId, $fieldId)
    {

        $fileDetail = new stdClass();
        $conn = $this->connectDB->openConnect();
        $sql = "SELECT f.status,field.name_field,field.group_id,user.fullname, f.score_subject_one, f.score_subject_two, f.score_subject_three,user.id  

                        from field join file as f on field.id = f.field_id
                                   JOIN user on user.id = f.user_id
                        where f.user_id = '{$userId}' and f.field_id ='{$fieldId}'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileDetail->status = $row["status"];
                $fileDetail->user_id = $row["id"];
                $fileDetail->name_field = $row["name_field"];
                $fileDetail->fullname = $row["fullname"];
                $fileDetail->score_one = $row["score_subject_one"];
                $fileDetail->score_two = $row["score_subject_two"];
                $fileDetail->score_three = $row["score_subject_three"];

                $group = new Group();
                $getGroupSql = "SELECT * from exam_groups WHERE id ={$row['group_id']} ";
                $resultGroup = $conn->query($getGroupSql);
                $rowGroup = $resultGroup->fetch_assoc();
                $group->setter_id($rowGroup["id"]);
                $group->setter_nameGroup($rowGroup["name_group"]);
                $group->setter_subject_one($rowGroup["subject_one"]);
                $group->setter_subject_two($rowGroup["subject_two"]);
                $group->setter_subject_three($rowGroup["subject_three"]);

                $fileDetail->group = $group;
            }
        }

        return $fileDetail;
    }

    public function getFileDetailField($fieldId)
    {

        $listFile = [];

        $conn = $this->connectDB->openConnect();
        $sql = "SELECT   f.id as fid,f.status,field.name_field,field.group_id,user.fullname, f.score_subject_one, f.score_subject_two, f.score_subject_three,user.id 

                        from field join file as f on field.id = f.field_id
                                   JOIN user on user.id = f.user_id
                        where f.field_id ='{$fieldId}'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileDetail = new stdClass();
                $fileDetail->status = $row["status"];
                $fileDetail->user_id = $row["id"];
                $fileDetail->file_id = $row["fid"];
                $fileDetail->name_field = $row["name_field"];
                $fileDetail->fullname = $row["fullname"];
                $fileDetail->score_one = $row["score_subject_one"];
                $fileDetail->score_two = $row["score_subject_two"];
                $fileDetail->score_three = $row["score_subject_three"];

                $group = new Group();
                $getGroupSql = "SELECT * from exam_groups WHERE id ={$row['group_id']} ";
                $resultGroup = $conn->query($getGroupSql);
                $rowGroup = $resultGroup->fetch_assoc();
                $group->setter_id($rowGroup["id"]);
                $group->setter_nameGroup($rowGroup["name_group"]);
                $group->setter_subject_one($rowGroup["subject_one"]);
                $group->setter_subject_two($rowGroup["subject_two"]);
                $group->setter_subject_three($rowGroup["subject_three"]);

                $fileDetail->group = $group;

                $listFile[] = $fileDetail;
            }
        }

        return $listFile;
    }

    public function updateStatusFile($userId, $fieldId, $status, $fileId)
    {
        $sql = "";
        $date = date("Y-m-d");
        $conn = $this->connectDB->openConnect();

        if ($status == 0) {
            $sql = "UPDATE file
        SET status = 0, date_review ='{$date}'
        WHERE user_id ='{$userId}' and field_id ='{$fieldId}' ";

            if ($conn->query($sql) === TRUE) {
                return true;
            }
        }

        if ($status == 1) {
            $sql = "UPDATE file
            SET status = 1, date_review ='{$date}'
            WHERE user_id ='{$userId}' and field_id ='{$fieldId}' ";

            if ($conn->query($sql) === TRUE) {
                return true;
            }
        }

        if ($status == 2) {
            $sql = "DELETE FROM file
                    WHERE user_id ='{$userId}' and field_id ='{$fieldId}' ";
            $sqlDelete = "DELETE FROM uploaded_files
                    WHERE  file_id ='{$fileId}' ";

            if ($conn->query($sql) === TRUE && $conn->query($sqlDelete) === TRUE) {
                return true;
            }
        }




        return false;
    }


   
}
