
<?php
interface  FieldRepository
{
    public function getAllField();
    public function insertField($field);
    public function deleteField($id);
    public function getFieldStatusoff();
    public function updateField($field);
}


?>