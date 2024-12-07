<?php
interface GroupRepository
{
    public function getAllGroup();
    public function insertGroup($group);
    public function checkExistGroup($nameGroup);
}
