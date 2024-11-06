<?php
interface UserFieldRepositoty
{
    public function insertUserField($user_id, $field_id, $date);
    public function deleteUserField($userField_id);
}
