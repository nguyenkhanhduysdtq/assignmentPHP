<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="../assets/css/editStyles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng ký Ngành học</title>

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

            <nav class="navbar">
                <ul class="navbar__list">
                    <li>
                        <a href="../navigation/index.php?layer=user&&action=getAccount" class="navbar__item">Phân tài khoản giáo viên</a>
                    </li>
                    <li>
                        <a href="../navigation/index.php?layer=field&&action=getStatiscalStatus" class="navbar__item">Xem thống kê hồ sơ</a>
                    </li>

                    <li>
                        <a href="#!" class="navbar__item">Xem thông tin cá nhân</a>
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
    <div class="wrapper_edit">



        <h2>Thông tin ngành chỉnh sửa </h2>

        <?php
        if (isset($check)) {
            if ($check == true) {

                echo " <div class='alert success'>
                <input type='checkbox' id='alert2' />
                <label class='close' title='close' for='alert2'>
                    <i class='icon-remove'></i>
                </label>
                <p class='inner'>
                   Cập nhật thành công
                </p>
            </div>";
            } else {
                echo "  <div class='alert error'>
                <input type='checkbox' id='alert1' />
                <label class='close' title='close' for='alert1'>
                    <i class='icon-remove'></i>
                </label>
                <p class='inner'>
                    <strong>cảnh báo!</strong> cập nhật không thành công
                </p>
            </div>";
            }
        }
        ?>

        <form action="../navigation/index.php?layer=field&&action=finalEdit" method="post">

            <div class="form-group">
                <label for="nganh">Tên Ngành:<span style="color: red;"> * Không thể sửa</span></label>

                <input type="text" id="nganh" name="major" value="<?php echo $field->getter_nameField() ?>" readonly>
            </div>
            <div class="form-group">
                <label for="start-date">Ngày Bắt Đầu:</label>
                <input type="date" id="start-date" name="start_date" value="<?php echo $field->getter_start_time() ?>">
            </div>
            <div class="form-group">
                <label for="end-date">Ngày Kết Thúc:</label>
                <input type="date" id="end-date" name="end_date" value="<?php echo $field->getter_end_time() ?>">
            </div>
            <div class="form-group">
                <label for="khoi-thi">Khối Thi:</label>
                <select id="khoi-thi" name="group" required>
                    <?php
                    foreach ($listGroup as $examGroup) {
                    ?>
                        <option value="<?php echo $examGroup->getter_id() ?>" <?php
                                                                                if ($examGroup->getter_id() == $field->getter_group()->getter_id()) {
                                                                                    echo "selected";
                                                                                } else {
                                                                                    echo "";
                                                                                }

                                                                                ?>><?php echo $examGroup->getter_nameGroup() ?></option>
                    <?php
                    }
                    ?>


                </select>
                <label for="khoi-thi">Trạng thái:</label>
                <select id="khoi-thi" name="status" required>
                    <option value="1" <?php
                                        if ($field->getter_status() == 1) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        }

                                        ?>>Mở</option>
                    <option value="0" <?php
                                        if ($field->getter_status() == 0) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        }

                                        ?>>Đóng</option>
                </select>
            </div>
            <button type="submit" name="submit_edit" class="submit-btn">Xác nhận</button>
            <input type="hidden" name="value_id" value="<?php echo $field->getter_id(); ?>">
        </form>

    </div>
</body>

</html>