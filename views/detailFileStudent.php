<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập điểm và Nộp hồ sơ</title>
    <style>
        /* Cài đặt chung cho toàn trang */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1,
        h3 {
            color: #333;
            margin-bottom: 30px;

        }

        .container {
            max-width: 900px;
            width: 100%;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 150px;

        }

        /* Bảng môn xét tuyển */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Input điểm */
        input[type="number"] {
            width: 80px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
        }

        /* Nút chung */
        .btn2 {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-upload {
            background-color: #3498db;
            margin-right: 10px;
        }

        .btn-upload:hover {
            background-color: #2980b9;
        }

        .btn-submit {
            background-color: #4CAF50;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        /* Nút bị vô hiệu hóa */
        .btn-disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
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

    <form action="../navigation/index.php?layer=file&&action=uploadFile" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1>Nghành xét tuyển : <strong style="color: red;"><?php echo $field->getter_nameField() ?></strong> </h1>

            <h3>Điền điểm cho từng môn </h3>
            <p style="margin-bottom: 20px;">Khối thi : <strong style="color: red;"><?php echo $field->getter_group()->getter_nameGroup() ?></strong></p>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Môn xét tuyển</th>
                        <th>Điểm</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>

                        <td><strong><?php echo $field->getter_group()->getter_subject_one() ?></strong></td>
                        <td><input name="one_score" type="number" min="0" max="10" step="0.1" placeholder="Điểm"></td>
                    </tr>
                    <tr>
                        <td>2</td>

                        <td><strong><?php echo $field->getter_group()->getter_subject_two() ?></strong></td>
                        <td><input name="two_score" type="number" min="0" max="10" step="0.1" placeholder="Điểm"></td>
                    </tr>
                    <tr>
                        <td>3</td>

                        <td><strong><?php echo $field->getter_group()->getter_subject_three() ?></strong></td>
                        <td><input name="three_score" type="number" min="0" max="10" step="0.1" placeholder="Điểm"></td>
                    </tr>

                </tbody>
            </table>

            <h3>Upload ảnh học bạ</h3>
            <div style="margin-bottom: 40px;">
                <input name="file" type="file" id="upload">
            </div>

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

            <button style="margin-top: 20px;" id="submit-button" class="btn2 btn-submit" name="submit">Nộp hồ sơ</button>
        </div>

        <input type="hidden" value="<?php echo $field->getter_id() ?>" name="value_id">

    </form>

</body>

</html>