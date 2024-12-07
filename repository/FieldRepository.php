
<?php
interface  FieldRepository
{
    public function getAllField();
    public function insertField($field);
    public function deleteField($id);
    public function getFieldStatusoff();
    public function updateField($field);
    public function getFieldEdit($id);
    public function editField($id);
    public function getFieldNotAssigned($username);
    public function getFieldDetailTeacher($userId);
    public function getFieldStatusOn();
    public function statiscicalStatusOffile();
    public function getFieldFllowingName($name);
}


?>