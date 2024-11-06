<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Học Sinh</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .profile-card {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            text-align: center;
            margin-top: 20px;
            height: auto;
            min-height: 500px;
            /* Đảm bảo chiều cao đủ dài */
        }

        .profile-card h2 {
            font-size: 28px;
            color: #007bff;
            margin-bottom: 30px;
        }

        .profile-info {
            text-align: left;
            margin-bottom: 30px;
        }

        .profile-info div {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .label {
            font-weight: bold;
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }

        .approved {
            background-color: #28a745;
        }

        .pending {
            background-color: #ffc107;
        }

        .rejected {
            background-color: #dc3545;
        }

        .btn-view {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-view:hover {
            background-color: #0056b3;
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

<div class="navigation1">
    <a href="../navigation/index.php?layer=field&&action=FieldStudent"><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
</div>

<body>
    <div class="profile-card">
        <h2>Hồ Sơ Đăng ký</h2>
        <p style="margin-bottom: 30px;"><Strong style="color: red;">* Bạn đã nộp hồ sơ không thể sửa</Strong></p>
        <div class=" profile-info">
            <div><span class="label">Họ Tên Học Sinh: </span><?php echo $fildeDetail->fullname ?></div>
            <div><span class="label">Tên Ngành Nộp Hồ Sơ: </span> <?php echo $fildeDetail->name_field ?></div>
            <div><span class="label">Tên Khối Xét Hồ Sơ: </span> <?php echo $fildeDetail->group->getter_nameGroup() ?></div>
            <div><span class="label">Tên Người Duyệt Hồ Sơ: </span><?php echo $user->getter_fullname() ?></div>
            <div><span class="label">Trạng Thái Hồ Sơ:</span> <span class="status <?php

                                                                                    if ($fildeDetail->status == 0) {
                                                                                        echo "pending";
                                                                                    } else if ($fildeDetail->status == 1) {
                                                                                        echo "approved";
                                                                                    } else {
                                                                                        echo "rejected";
                                                                                    }


                                                                                    ?>"><?php
                if ($fildeDetail->status == 0) {
                    echo "Chưa duyệt";
                } else if ($fildeDetail->status == 1) {
                    echo "đã duyệt";
                } else {
                    echo "Hồ sơ đã bị xóa";
                }

                ?></span></div>
        </div>
        <button class="btn-view" name="submit">xem chi tiết</button>
    </div>
</body>

</html>