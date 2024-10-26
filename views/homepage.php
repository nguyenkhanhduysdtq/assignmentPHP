<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo 'username:' . $user->getter_username() . '<br/>';
    echo 'password:' .  $user->getter_password() . '<br/>';
    echo 'name:' .  $user->getter_name() . '<br/>';
    echo 'fullname:' .  $user->getter_fullname() . '<br/>';
    echo 'creat_date:' .  $user->getter_creat_date() . '<br/>';
    echo 'modified_date:' .  $user->getter_modified_date() . '<br/>';
    echo 'role:' .  $user->getter_role() . '<br/>';

    if (isset($_POST["logout"])) {
    }
    ?>
    <form action="../navigation/index.php?layer=authen&&action=logout" method="post">

        <input type="submit" name="logout" value="trang login">

    </form>


</body>

</html>