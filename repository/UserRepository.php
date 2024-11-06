
<?php
interface userRepositoty
{
    public function checkUser($username, $password);
    public function checkExistUsername($username);
    public function signUp($user, $cfPassword);
    public function getAccountTeacher();
    public function getOneUser($id);
    public function getAssignUserAcceptField($username);

   
}


?>