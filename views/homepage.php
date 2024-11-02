<!DOCTYPE html>
<html lang="en">

<?php
if (!isset($_SESSION["user"])) {
    header("Location: ../views/login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo 'username:' . $_SESSION["user"]->getter_username() . '<br/>';
    echo 'name:' .  $_SESSION["user"]->getter_name() . '<br/>';
    echo 'fullname:' .  $_SESSION["user"]->getter_fullname() . '<br/>';
    echo 'create_date:' .  $_SESSION["user"]->getter_creat_date() . '<br/>';
    echo 'role:' .  $_SESSION["user"]->getter_role() . '<br/>';



    if (isset($_POST["logout"])) {
    }
    ?>
    <form action="../navigation/index.php?layer=authen&&action=logout" method="post">

        <input type="submit" name="logout" value="trang login">

    </form>


</body>

</html>