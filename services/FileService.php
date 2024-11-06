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
        $sql = "SELECT f.status,field.name_field,field.group_id,user.fullname

                        from field join file as f on field.id = f.field_id 
                                   JOIN user on user.id = f.user_id
                        where f.user_id = '{$userId}' and f.field_id ='{$fieldId}'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileDetail->status = $row["status"];
                $fileDetail->name_field = $row["name_field"];
                $fileDetail->fullname = $row["fullname"];

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
}
