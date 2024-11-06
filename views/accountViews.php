<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Người Dùng</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            height: 100vh;
            /* Đảm bảo chiều cao toàn bộ viewport */
            display: flex;
            /* Sử dụng flexbox để căn giữa */
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
        }

        .table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 1000px;
            /* Thiết lập chiều rộng của bảng */
            max-width: 100%;
            /* Chiều rộng tối đa */

        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
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

        .btn_action_2 {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn_action_2:hover {
            background-color: #45a049;
        }

        .navigation1 {
            margin: 20px auto;
            /* Khoảng cách giữa header và form */
            text-align: left;
            /* Căn trái hoặc thay đổi theo ý bạn */
            width: 100px;
            /* Đặt theo kích thước của .container nếu cần */
            position: absolute;
            margin-right: 100%;
            margin-bottom: 400px;
            margin-left: 150px;
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

        .title {
            text-align: center;
            margin-bottom: 30px;
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
    <a href="../navigation/index.php?layer=field&&action=dataHomepage"><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
</div>

<body>

    <form action="../navigation/index.php?layer=user&&action=detailAccount" method="post">
        <div class="table-container">
            <h1 class="title">Tài khoản giáo viên</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Tên</th>
                        <th>Fullname</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listUser as $user) {
                    ?>
                        <tr>
                            <td><?php echo $user->getter_id() ?></td>
                            <td><?php echo $user->getter_username() ?></td>
                            <td><?php echo $user->getter_name() ?></td>
                            <td><?php echo $user->getter_fullname() ?></td>
                            <td><?php echo $user->getter_creat_date() ?></td>
                            <td><?php echo $user->getter_modified_date() ?></td>
                            <td><button class="btn_action_2" name="submit" value=" <?php echo $user->getter_id() ?>">Thông tin</button></td>
                        </tr>


                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </form>
</body>

</html>