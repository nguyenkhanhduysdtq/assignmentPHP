<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- link CSS -->
    <link rel="stylesheet" href="../assets/css/globs.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    <!-- Embed fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Syne:wght@400..800&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <a href="#!" class="header__logo-link"> <!-- link -->
                    <img src="../assets/images/logo_hnue.jpeg" alt="image register" class="header__logo-img">
                    <span class="header__logo-text">My Team</span>
                </a>
            </div>


            <div class="header-action">
                <a href="./login.php" class="btn header-action__login">Sign In</a>
                <a href="../views/register.php" class="header-action__signup">Sign Up</a>
            </div>
        </div>
    </header>
    <div class="login">
        <img src="../assets/images/img_login.png" alt="" class="login__img">

        <form action="../navigation/index.php?layer=authen&&action=login" class="login__form" method="post">
            <h3 class="login__form-heading">Sign In</h3>

            <?php

            if (isset($_POST["submit-login"])) {
                if ($error == "") {
                    echo "";
                } else {
                    echo "<p style='color: red;'>$error</p>";
                }
            }
            ?>

            <input type="text" name="username" placeholder="Username" class="login__input">

            <input type="password" name="password" placeholder="Password" class="login__input">

            <input type="submit" name="submit-login" value="Sign In" class="login__input login__input-submit">

           
        </form>

    </div>
    <?php
    if (isset($_POST['link-register'])) {
        header('location: register.php');
    }
    ?>

</body>

</html>