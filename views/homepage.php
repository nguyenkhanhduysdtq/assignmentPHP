<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    echo 'Title:' . $user->getter_username() . '<br/>';
    echo 'Author:' .  $user->getter_password() . '<br/>';
    echo 'Author:' .  $user->getter_role() . '<br/>';

    if (isset($_POST["logout"])) {
        echo "đã vào đây";
    }
    ?>
    <form action="../views/login.php " method="post">

        <button type="submit" name="logout">trang login</button>

    </form>

</body>

</html>