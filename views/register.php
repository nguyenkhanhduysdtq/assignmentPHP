<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <!-- link CSS -->
    <link rel="stylesheet" href="../assets/css/globs.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/register.css">

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
                <a href="./login.php" class="header-action__login">Sign In</a>
                <a href="./register.php" class="btn header-action__signup">Sign Up</a>
            </div>
        </div>
    </header>

    <div class="register">
        <img src="../assets/images/img_register.png" alt="" class="register__img">

        <form action="../navigation/index.php?layer=authen&&action=signUp" class="register__form" method="post">
            <h3 class="register__form-heading">Sign Up</h3>

            <?php

            if (isset($_POST["submit-register"])) {
                if ($check == "") {
                    echo "";
                } else {
                    echo "<p style='color: red;'>$check</p>";
                }
            }

            ?>

            <input type="text" name="fullname" placeholder="Fullname" class="register__input">

            <input type="text" name="username" placeholder="Username" class="register__input">

            <input type="password" name="password" placeholder="Password" class="register__input">

            <input type="password" name="cfpass" placeholder="Confirm password" class="register__input">

            <input type="submit" name="submit-register" value="Sign Up" class="register__input register__input-submit">




        </form>
    </div>
    <?php
    if (isset($_POST['link-login'])) {
        header('Location: login.php');
    }
    ?>

</body>

</html>