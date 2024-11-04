<?php
include("../repository/GroupRepository.php");
include("../utills/connectDB.PHP");
include("../models/Group.php");

class GroupService implements GroupRepository
{
    public $connectDB;

    public function __construct()
    {
        $this->connectDB = new connectDB();
    }

    public function getAllGroup()
    {

        $listGroup = [];
        $conn = $this->connectDB->openConnect();

        $sql = "SELECT * FROM exam_groups ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $group = new Group();
                $group->setter_id($row["id"]);
                $group->setter_nameGroup($row["name_group"]);
                $group->setter_subject_one($row["subject_one"]);
                $group->setter_subject_two($row["subject_two"]);
                $group->setter_subject_three($row["subject_three"]);

                $listGroup[] = $group;
            }
        }

        return $listGroup;
    }
}
