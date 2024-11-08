<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Hồ Sơ Học Sinh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info label {
            font-weight: bold;
            color: #555;
        }

        .info span {
            color: #333;
        }

        .subjects {
            margin-top: 20px;
        }

        .subject {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .subject:last-child {
            border-bottom: none;
        }

        /* Định dạng nút điều hướng để phù hợp với phong cách của trang */
        .navigation__button {
            background-color: rgb(0, 106, 255);
            /* Sử dụng màu chủ đạo */
            color: #fff;
            /* Màu chữ */
            padding: 10px 20px;
            /* Khoảng cách bên trong nút */
            border: none;
            border-radius: 5px;
            font-size: 1.6rem;
            /* Đặt kích thước chữ theo root font-size */
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            min-width: 150px;

        }

        /* Hiệu ứng khi rê chuột vào nút */
        .navigation__button:hover {
            opacity: 0.8;
        }

        .navigation1 {
            margin: 20px auto;
            /* Khoảng cách giữa header và form */
            text-align: left;
            /* Căn trái hoặc thay đổi theo ý bạn */
            width: 100px;
            /* Đặt theo kích thước của .container nếu cần */

            /* margin-right: 100%;
            margin-bottom: 400px;
            marg
            in-left: 150px; */
        }

        .wrapper {
            position: absolute;
            margin-right: 100%;
            margin-bottom: 300px;
            margin-left: 150px;
        }
    </style>
</head>

<header class="header">
    <div class="header__inner">
        <div class="header__logo">
            <a href="#!" class="header__logo-link"> <!-- link -->
                <img src="../assets/images/logo_hnue.jpeg" alt="image register" class="header__logo-img">
                <span class="header__logo-text">My Team</span>
            </a>
        </div>


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

<form class="wrapper" action="../navigation/index.php?layer=<?php
                                                            if ($_SESSION["user"]->getter_role() == 3) {
                                                                echo "file";
                                                            } else if ($_SESSION["user"]->getter_role() == 1 || $_SESSION["user"]->getter_role() == 5) {
                                                                echo "field";
                                                            }

                                                            ?>&&action=<?php
                                                                        if ($_SESSION["user"]->getter_role() == 3) {
                                                                            echo "getfileOfField";
                                                                        }
                                                                        if ($_SESSION["user"]->getter_role() == 1) {
                                                                            echo "editField";
                                                                        }

                                                                        if ($_SESSION["user"]->getter_role() == 5) {
                                                                            echo "FieldStudent";
                                                                        }

                                                                        ?>" method="post">
    <div class="navigation1">
        <a><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
    </div>
    <input type="hidden" value="<?php echo $fieldId ?>" name="value_id">

</form>


<body>
    <div class="container">
        <h2>Thông Tin Chi tiết Hồ Sơ</h2>
        <div class="info">
            <label><strong>Tên học sinh:</strong></label> <span><?php echo  $fileDetail->fullname ?></span>
        </div>
        <div class="info">
            <label><strong>Tên ngành nộp hồ sơ:</strong></label> <span><?php echo $fileDetail->name_field ?></span>
        </div>
        <div class="info">
            <label><strong>Tên khối xét hồ sơ:</strong></label> <span><?php echo $fileDetail->group->getter_nameGroup() ?></span>
        </div>
        <div class="subjects">
            <h3>Điểm các môn</h3>
            <div class="subject">
                <span><?php echo $fileDetail->group->getter_subject_one() ?></span> <span><?php echo $fileDetail->score_one ?></span>
            </div>
            <div class="subject">
                <span><?php echo $fileDetail->group->getter_subject_two() ?></span> <span><?php echo $fileDetail->score_two ?></span>
            </div>
            <div class="subject">
                <span><?php echo $fileDetail->group->getter_subject_three() ?></span> <span><?php echo $fileDetail->score_three ?></span>
            </div>
        </div>
    </div>
</body>

</html>