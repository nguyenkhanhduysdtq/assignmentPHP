<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản Lý Hồ Sơ</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        } */

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            margin-top: 200px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .industry {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .industry h2 {
            margin: 0;
            font-size: 2rem;
            color: red;

        }

        .status {
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
        }

        .status div {
            text-align: center;
        }

        .status div h3 {
            margin: 0;
            color: #666;
        }

        .approved {
            color: #4caf50;
            font-size: 1.8rem;
        }

        .pending {
            color: #ffc107;
            font-size: 1.8rem;
        }

        .rejected {
            color: #f44336;
            font-size: 1.8rem;
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

        h3 {
            margin-bottom: 3px;
        }

        .submit {
            background-color: #4CAF50;
            /* Màu xanh lá cây */
            color: white;
            /* Màu chữ */
            padding: 10px 20px;
            /* Khoảng cách bên trong */
            border: none;
            /* Bỏ viền */
            border-radius: 5px;
            /* Bo góc */
            cursor: pointer;
            /* Con trỏ thay đổi khi di chuột */
            font-size: 16px;
            /* Kích thước chữ */
        }

        .submit:hover {
            background-color: #45a049;
            /* Màu khi di chuột qua */
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
                    <a href="../navigation/index.php?layer=user&&action=getAccount" class="navbar__item">Phân tài khoản giáo viên</a>
                </li>
                <li>
                    <a href="../navigation/index.php?layer=field&&action=getStatiscalStatus" class="navbar__item">Xét thống kê hồ sơ</a>
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


<body>
    <div class="container">
        <h1>Thống kê Hồ Sơ Theo Ngành</h1>

        <?php
        foreach ($listInforField as $field) {
        ?>
            <form action="../navigation/index.php?layer=field&&action=editField" method="post">
                <!-- Ngành Công Nghệ Thông Tin -->
                <div class="card">
                    <div class="industry">
                        <h2><?php echo $field->name_field ?></h2>
                    </div>
                    <div class="status">
                        <div>
                            <h3>Đã duyệt</h3>
                            <p class="approved"><?php
                                                if ($field->accepted == null) {
                                                    echo "0";
                                                } else {
                                                    echo $field->accepted;
                                                }

                                                ?></p>
                        </div>
                        <div>
                            <h3>Chưa duyệt</h3>
                            <p class="pending"><?php
                                                if ($field->pended == null) {
                                                    echo "0";
                                                } else {
                                                    echo  $field->pended;
                                                }

                                                ?></p>
                        </div>
                        <div>
                            <h3>Không duyệt</h3>
                            <p class="rejected"><?php
                                                if ($field->rejected == null) {
                                                    echo "0";
                                                } else {
                                                    echo $field->rejected;
                                                }

                                                ?></p>
                        </div>

                        <div>

                            <button class="submit" name="submit">Xem chi tiết</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $field->id ?>" name="value_id">
            </form>

        <?php
        }
        ?>


    </div>
</body>

</html>