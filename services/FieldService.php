<?php
include_once("../repository/FieldRepository.php");
include_once("../models/Field.php");
include_once("../utills/connectDB.PHP");
include_once("../models/Group.php");


class FieldService implements FieldRepository
{

    public $connectDB;

    public function __construct()
    {
        $this->connectDB = new connectDB();
    }


    public function getAllField()
    {

        $listField = [];

        $conn = $this->connectDB->openConnect();

        $getAllFieldSql = "SELECT * from field";


        $result = $conn->query($getAllFieldSql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $field = new Field();
                $field->setter_id($row["id"]);
                $field->setter_nameField($row["name_field"]);
                $field->setter_start_time($row["start_time"]);
                $field->setter_end_time($row["end_time"]);
                $field->setter_status($row["status"]);


                $group = new Group();
                $getGroupSql = "SELECT * from exam_groups WHERE id ={$row['group_id']} ";
                $resultGroup = $conn->query($getGroupSql);
                $rowGroup = $resultGroup->fetch_assoc();
                $group->setter_id($rowGroup["id"]);
                $group->setter_nameGroup($rowGroup["name_group"]);
                $group->setter_subject_one($rowGroup["subject_one"]);
                $group->setter_subject_two($rowGroup["subject_two"]);
                $group->setter_subject_three($rowGroup["subject_three"]);

                
                $field->setter_group($group);

                $listField[] = $field;
            }
        }

        return $listField;
    }
}
