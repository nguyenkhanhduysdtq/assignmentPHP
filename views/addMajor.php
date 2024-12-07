<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/addMajorStyles.css">
    <link rel="stylesheet" href="../assets/css/globs.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý ngành học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f4f8, #d4e0e9);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;

        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background: linear-gradient(135deg, #0056b3, #00408a);
            color: white;
        }

        table tr:hover {
            background-color: #fbe9e7;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-row {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .form-row input,
        .form-row select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            padding: 10px 20px;
            background: linear-gradient(135deg, #0056b3, #00408a);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-container button:hover {
            background-color: #e64a19;
        }

        .container_major {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 230px;
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
            margin-right: 100%;
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
    </style>
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
    <div class="container_major">
        <h1>Nhập thông tin ngành mới</h1>
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
        <table>
            <thead>
                <tr>
                    <th>Mã ngành</th>
                    <th>Tên ngành</th>
                    <th>Khối</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($listField as $field) {
                ?>
                    <tr>
                        <td><?php echo $field->getter_id() ?></td>
                        <td><?php echo $field->getter_nameField() ?></td>
                        <td><?php echo $field->getter_group()->getter_nameGroup() ?></td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

        <div class="form-container">
            <form action="../navigation/index.php?layer=field&&action=addMajor" method="post">
                <div class="form-row">
                    <input type="text" placeholder="Tên ngành" name="nameMajor" required>
                    <select id="khoi" name="group">
                        <option value="0" disabled selected>Chọn khối</option>

                        <?php
                        foreach ($listGroup as $examGroup) {
                        ?>
                            <option value="<?php echo $examGroup->getter_id() ?>"><?php echo $examGroup->getter_nameGroup() ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <button class="submit" name="submitAddField" type="submit">Thêm ngành</button>
            </form>
        </div>
    </div>
</body>

</html>