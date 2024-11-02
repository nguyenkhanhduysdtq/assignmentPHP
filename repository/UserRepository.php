
<?php
interface userRepositoty
{
    public function checkUser($username, $password);
    public function checkExistUsername($username);
    public function signUp($user, $cfPassword);
}


?>