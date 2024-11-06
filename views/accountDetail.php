<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 200px;
        }

        p {
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .profile {
            margin-bottom: 20px;
        }

        .profile p {
            line-height: 1.6;
        }

        .select-container {
            margin-bottom: 20px;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .table_container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0081be;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .title_select {
            color: red;
        }

        .btn_accept {
            background-color: #0081be;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn_accept:hover {
            background-color: #104a66;
        }

        .navigation1 {
            margin: 20px auto;
            /* Khoảng cách giữa header và form */
            text-align: left;
            /* Căn trái hoặc thay đổi theo ý bạn */
            width: 100px;
            /* Đặt theo kích thước của .container nếu cần */
            position: absolute;
            margin-top: 200px;
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

        .btn_action_2 {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn_action_2:hover {
            background-color: red;
        }

        @import url(https://fonts.googleapis.com/css?family=Lobster);

        @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css);

        body {
            background-image: url(https://subtlepatterns.com/patterns/bedge_grunge.png);
            background-position: initial initial;
            background-repeat: initial initial;
        }

        /* h1 {
font-family: "Lobster";
font-size: 32pt;
color: rgb(255, 153, 0);
text-shadow: 0px 2px 3px rgb(255, 238, 204);
text-align: center;
padding: 6px 0px 0px 0px;
margin: 6px 0px 0px 0px;
} */

        .alert .inner {
            display: block;
            padding: 6px;
            margin: 6px;
            border-radius: 3px;
            border: 1px solid rgb(180, 180, 180);
            background-color: rgb(212, 212, 212);
            text-align: center;
            width: 300px;
            margin: 0 auto;
            /* Căn giữa theo chiều ngang */
            /* Căn giữa theo chiều dọc */

        }

        .alert .close {
            float: right;
            margin: 3px 12px 0px 0px;
            cursor: pointer;
        }

        .alert .inner,
        .alert .close {
            color: rgb(88, 88, 88);
        }

        .alert input {
            display: none;
        }

        .alert input:checked~* {
            animation-name: dismiss, hide;
            animation-duration: 300ms;
            animation-iteration-count: 1;
            animation-timing-function: ease;
            animation-fill-mode: forwards;
            animation-delay: 0s, 100ms;
        }

        .alert.error .inner {
            border: 1px solid rgb(238, 211, 215);
            background-color: rgb(242, 222, 222);
        }

        .alert.error .inner,
        .alert.error .close {
            color: rgb(185, 74, 72);
        }

        .alert.success .inner {
            border: 1px solid rgb(214, 233, 198);
            background-color: rgb(223, 240, 216);
        }

        .alert.success .inner,
        .alert.success .close {
            color: rgb(70, 136, 71);
        }

        .alert.info .inner {
            border: 1px solid rgb(188, 232, 241);
            background-color: rgb(217, 237, 247);
        }

        .alert.info .inner,
        .alert.info .close {
            color: rgb(58, 135, 173);
        }

        .alert.warning .inner {
            border: 1px solid rgb(251, 238, 213);
            background-color: rgb(252, 248, 227);
        }

        .alert.warning .inner,
        .alert.warning .close {
            color: rgb(192, 152, 83);
        }

        @keyframes dismiss {
            0% {
                opacity: 1;
            }

            90%,
            100% {
                opacity: 0;
                font-size: 0.1px;
                transform: scale(0);
            }
        }

        @keyframes hide {
            100% {
                height: 0px;
                width: 0px;
                overflow: hidden;
                margin: 0px;
                padding: 0px;
                border: 0px;
            }

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

        <nav class="navbar">
            <ul class="navbar__list">
                <li>
                    <a href="#!" class="navbar__item">Phân tài khoản giáo viên</a>
                </li>
                <li>
                    <a href="#!" class="navbar__item">Xét hồ sơ</a>
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
    <a href="../navigation/index.php?layer=user&&action=getAccount"><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
</div>

<body>
    <form action="../navigation/index.php?layer=user&&action=assignTeacher" method="post">
        <div class="container">
            <h1>Thông Tin Tài Khoản</h1>
            <?php
            if (isset($check)) {
                if ($check == true) {

                    echo " <div class='alert success'>
                <input type='checkbox' id='alert2' />
                <label class='close' title='close' for='alert2'>
                    <i class='icon-remove'></i>
                </label>
                <p class='inner'>
                   Thêm thành công
                </p>
            </div>";
                } else {
                    echo "  <div class='alert error'>
                <input type='checkbox' id='alert1' />
                <label class='close' title='close' for='alert1'>
                    <i class='icon-remove'></i>
                </label>
                <p class='inner'>
                    <strong>cảnh báo!</strong> Thêm không thành công
                </p>
            </div>";
                }
            }
            ?>
            <div class="profile">

                <p><strong>ID:</strong><?php echo $user->getter_id() ?></p>
                <p><strong>Username:</strong> <?php echo $user->getter_username() ?></p>
                <p><strong>Tên:</strong> <?php echo $user->getter_name() ?></p>
                <p><strong>họ tên đầy đủ:</strong> <?php echo $user->getter_fullname() ?></p>
                <p><strong>Loại tài khoản:</strong> Giáo viên</p>

            </div>

            <input type="hidden" value="<?php echo $user->getter_id() ?>" name="valueUser">

            <div class="select-container">
                <label for="options" class="title_select"> * Phân công duyệt hồ sơ nghành xét tuyển:</label>
                <select id="options" name="field_id">
                    <?php
                    foreach ($listField as $field) {

                    ?>
                        <option value="<?php echo $field->getter_id() ?>"><?php echo $field->getter_field_name() ?></option>

                    <?php
                    }

                    ?>

                </select>
                <button class="btn_accept" name="submit" value="<?php echo $user->getter_id()  ?>">Chọn</button>
            </div>

            <div class="table_container">
                <h2>Bảng Thông Tin Được Phân Công</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên nghành</th>
                            <th>Ngày Tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($listAssignField as $assigned) {
                        ?>
                            <tr>
                                <td><?php echo $assigned->getter_id() ?></td>
                                <td><?php echo $assigned->getter_field_name() ?></td>
                                <td><?php echo $assigned->getter_assigned_at() ?></td>
                                <td><button class="btn_action_2" value="<?php echo $assigned->getter_id()  ?>" name="submitDelete">Xóa</button></td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </form>
</body>

</html>