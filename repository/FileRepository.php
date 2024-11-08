<?php
interface FileRepository
{
    public function insertFile($file);
    public function checkUserAndFieldExist($fieldId, $userId);
    public function getInforDetail($userId, $fieldId);
    public function updateStatusFile($userId, $fieldId, $status,$fileId);
}
