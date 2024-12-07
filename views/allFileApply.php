<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Hồ Sơ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, #0056b3, #00408a);
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef5ff;
        }

        td {
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        caption {
            margin-bottom: 10px;
            font-size: 1.5em;
            font-weight: bold;
            color: #00408a;
        }

        .pending {
            background-color: #fff7c2;
            /* Vàng nhạt */
        }

        .success {
            background-color: green;
            color: white;
            /* Vàng nhạt */
        }

        .rejected {
            background-color: #f8d7da;
            /* Đỏ nhạt */
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
                        <a href="../navigation/index.php?layer=file&&action=getAllFile" class="navbar__item">Xem thông tin hồ sơ đã nộp</a>
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
        <a href="../navigation/index.php?layer=field&&action=FieldStudent"><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
    </div>

    <table>
        <caption>Thông Tin Hồ Sơ</caption>
        <tr>
            <th>Họ Tên Học Sinh</th>
            <th>Tên Ngành Nộp Hồ Sơ</th>
            <th>Tên Khối Xét Hồ Sơ</th>
            <th>Trạng thái đăng ký</th>
            <th>Trạng Thái Hồ Sơ</th>
        </tr>
        <?php
        foreach ($listFileApply as $file) {
        ?>
            <tr>
                <td><?php echo $_SESSION["user"]->getter_fullname() ?></td>
                <td><?php echo $file->name_field ?></td>
                <td><?php echo $file->group->getter_nameGroup() ?></td>
                <td><?php $endDateTime = new DateTime($file->end_time);
                    $currentDateTime = new DateTime();
                    if ($endDateTime < $currentDateTime) {
                        echo "<p style='color: red;'>Đã hết hạn</p>";
                    } else {
                        echo "<p style='color: green;'>Có thể xem</p>";
                    }

                    ?></td>
                <td><?php if ($file->status == 1) {
                        echo "Đã duyệt";
                    } elseif ($file->status == 0) {
                        echo "Chưa duyệt";
                    } else {
                        echo "Không duyệt";
                    } ?></td>
            </tr>



        <?php
        }
        ?>
        <?php
        if (isset($title)) {
            echo "
                 <tr>
                <td colspan='5'>
                             <p  style='color: red;'>$title</p>
                          </td>
                          </tr>
                          ";
        }
        ?>

    </table>

    <script>
        document.querySelectorAll("table tr").forEach(row => {
            const statusCell = row.cells[row.cells.length - 1];
            if (statusCell) {
                if (statusCell.textContent.trim() === "Chưa duyệt") {
                    statusCell.classList.add("pending");
                } else if (statusCell.textContent.trim() === "Không duyệt") {
                    statusCell.classList.add("rejected");
                } else if (statusCell.textContent.trim() === "Đã duyệt") {
                    statusCell.classList.add("success");
                }
            }
        });
    </script>
</body>

</html>