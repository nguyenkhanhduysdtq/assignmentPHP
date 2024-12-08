<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/formField.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>




<body class="field">

    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <a href="#!" class="header__logo-link"> <!-- link -->
                    <img src="../assets/images/logo_hnue.jpeg" alt="image register" class="header__logo-img">
                    <span class="header__logo-text">My Team</span>
                </a>
            </div>

            <nav class="navbar">
                <ul class="navbar__list">
                    <li>
                        <a href="../navigation/index.php?layer=user&&action=getAccount" class="navbar__item">Phân tài khoản giáo viên</a>
                    </li>
                    <li>
                        <a href="../navigation/index.php?layer=field&&action=getStatiscalStatus" class="navbar__item">Xem thống kê hồ sơ</a>
                    </li>

                    <li>
                        <a href="../navigation/index.php?layer=group&&action=viewAddGroup" class="navbar__item">Thêm khối thi</a>
                    </li>
                </ul>
            </nav>

            <div class="header-action">

                <!-- dropdown -->
                <input class="dark-light" type="checkbox" id="dark-light" name="dark-light" />
                <label for="dark-light"></label>

                <div class="light-back"></div>



                <div class="sec-center">
                    <input class="dropdown" type="checkbox" id="dropdown" name="dropdown" />
                    <label class="for-dropdown" for="dropdown"><?php if (isset($_SESSION["user"])) {
                                                                    echo "<p>{$_SESSION['user']->getter_fullname()}</p>";
                                                                } ?> <i class="uil uil-arrow-down"></i></label>
                    <div class="section-dropdown">

                        <a href="../navigation/index.php?layer=authen&&action=logout" class="for-dropdown-sub">Đăng xuất<i class="uil uil-arrow-right"></i></a>
                    </div>
                </div>

                <!-- dropdown -->

            </div>
        </div>
    </header>

    <div class="navigation1">
        <a href="../navigation/index.php?layer=field&&action=dataHomepage"><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
    </div>

    <div class="form_page">
        <div class="form_container">


            <h1 style="margin-bottom: 30px;">Nhập thông tin khối thi</h1>
            <?php
            if (isset($check)) {
                if ($check == true) {

                    echo " <div class='alert success'>
                <input type='checkbox' id='alert2' />
                <label class='close' title='close' for='alert2'>
                    <i class='icon-remove'></i>
                </label>
                <p class='inner'>
                   $title
                </p>
            </div>";
                } else {
                    echo "  <div class='alert error'>
                <input type='checkbox' id='alert1' />
                <label class='close' title='close' for='alert1'>
                    <i class='icon-remove'></i>
                </label>
                <p class='inner'>
                    <strong>cảnh báo!</strong> $title
                </p>
            </div>";
                }
            }
            ?>
            <form action="../navigation/index.php?layer=group&&action=addGroup" method="post">
                <div class="form_group">
                    <label for="nganh">Nhập tên khối thi</label>
                    <input type="text" class="add_major" name="nameGroup">
                </div>

                <div class="form_group">
                    <label for="nganh">Nhập môn thứ 1 <strong style="color: red; font-size: 13px;">* Vui lòng viết có dấu</strong></label>
                    <input type="text" class="add_major" name="subjectGroup1">
                </div>

                <div class="form_group">
                    <label for="nganh">Nhập môn thứ 2 <strong style="color: red; font-size: 13px;">* Vui lòng viết có dấu</strong></label>
                    <input type="text" class="add_major" name="subjectGroup2">
                </div>

                <div class="form_group">
                    <label for="nganh">Nhập môn thứ 3 <strong style="color: red; font-size: 13px;">* Vui lòng viết có dấu</strong></label>
                    <input type="text" class="add_major" name="subjectGroup3">
                </div>


                <button class="submit" name="submitAddField" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</body>

</html>