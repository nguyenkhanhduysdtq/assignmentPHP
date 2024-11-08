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

        $getAllFieldSql = "SELECT * from field where status != 3";


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


    public function insertField($field)
    {

        $conn = $this->connectDB->openConnect();

        $newField = new Field();

        $newField->setter_nameField($field->getter_nameField());
        $newField->setter_start_time($field->getter_start_time());
        $newField->setter_end_time($field->getter_end_time());
        $newField->setter_group($field->getter_group());
        $newField->setter_status(0);


        $getAllFieldSql = "SELECT * from field";

        $result = $conn->query($getAllFieldSql);

        $sql = "INSERT INTO field (name_field,start_time,end_time,group_id,status)
VALUES ('{$newField->getter_nameField()}' , '{$newField->getter_start_time()}', '{$newField->getter_end_time()}','{$newField->getter_group()}','{$newField->getter_status()}')";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            }
        }

        if ($conn->query($sql) === TRUE) {
            return true;
        }

        return false;
    }

    public function deleteField($id)
    {
        $conn = $this->connectDB->openConnect();
        $sql = "UPDATE field SET status=3 ,start_time='',end_time='' WHERE id=$id";

        if ($conn->query($sql) === true) {
            return true;
        }
        return false;
    }

    public function getFieldStatusoff()
    {
        $listField = [];
        $conn = $this->connectDB->openConnect();

        $sql = "SELECT * FROM field where status = 3";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $field = new Field();
                $field->setter_id($row["id"]);
                $field->setter_nameField($row["name_field"]);

                $listField[] = $field;
            }
        }

        return $listField;
    }

    public function updateField($field)
    {
        $conn = $this->connectDB->openConnect();

        $id = $field->getter_id();

        $sql = "UPDATE field SET status= 0 ,start_time='{$field->getter_start_time()}',end_time='{$field->getter_end_time()}' WHERE id=$id ";

        $result = $conn->query($sql);

        if ($result === true) {
            return true;
        }

        return false;
    }


    public function getFieldEdit($id)
    {
        $conn = $this->connectDB->openConnect();

        $sql = "SELECT * FROM field where id =$id";

        $field = new Field();

        $result = $conn->query($sql);

        if ($result->num_rows != 0) {
            while ($row = $result->fetch_assoc()) {
                $field->setter_id($row["id"]);
                $field->setter_nameField($row["name_field"]);
                $field->setter_end_time($row["end_time"]);
                $field->setter_start_time($row["start_time"]);
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
            }
        }

        return $field;
    }



    public function editField($field)
    {
        $conn = $this->connectDB->openConnect();

        $id = $field->getter_id();

        $sql = "UPDATE field SET start_time='{$field->getter_start_time()}',end_time='{$field->getter_end_time()}',group_id='{$field->getter_group()}'
        
        ,status = '{$field->getter_status()}' WHERE id=$id ";

        $result = $conn->query($sql);

        if ($result === true) {
            return true;
        }

        return false;
    }

    public function  getFieldNotAssigned($username)
    {

        $conn = $this->connectDB->openConnect();

        $listField = [];

        $sql = "SELECT distinct  field.name_field, field.id 
                      from
                        field 

                      where field.id not in     
                              (SELECT field.id
                                  FROM 
                                    user 
                                  JOIN 
                                    user_field as uf on user.id = uf.user_id
                                  right join
                                    field on uf.field_id = field.id
                                where 
                                    field.status = 1 and user.username ='{$username}' ) and field.status = 1;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $field = new UserField();

                $field->setter_id($row["id"]);
                $field->setter_field_name($row["name_field"]);
                $listField[] = $field;
            }

            return $listField;
        }
        return [];
    }


    public function getFieldDetailTeacher($userId)
    {

        $conn = $this->connectDB->openConnect();
        $listField = [];
        $sql = " SELECT field.id ,field.name_field,field.group_id,field.start_time,field.end_time

                          FROM user as us
 
                          join user_field as uf on us.id = uf.user_id 
                          join field on uf.field_id =  field.id
                          where us.id = '{$userId}' ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $field = new Field();
                $field->setter_id($row["id"]);
                $field->setter_nameField($row["name_field"]);
                $field->setter_end_time($row["end_time"]);
                $field->setter_start_time($row["start_time"]);

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


    public function getFieldStatusOn()
    {
        $conn = $this->connectDB->openConnect();

        $sql = "SELECT * FROM field where status = 1";

        $listField = [];

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $field = new Field();
                $field->setter_id($row["id"]);
                $field->setter_nameField($row["name_field"]);
                $field->setter_end_time($row["end_time"]);
                $field->setter_start_time($row["start_time"]);

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
