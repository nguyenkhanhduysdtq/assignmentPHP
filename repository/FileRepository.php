<?php
interface FileRepository
{
    public function insertFile($file);
    public function checkUserAndFieldExist($fieldId, $userId);
    public function getInforDetail($userId, $fieldId);
}
