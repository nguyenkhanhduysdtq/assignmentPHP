<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/css/detailFileStyles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng hồ sơ học sinh</title>

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

<body>

    <div class="navigation1">
        <a href="../navigation/index.php?layer=field&&action=FieldTeacher"><input type="submit" class="navigation__button" value="Trở về" name="navigation"></a>
    </div>

    <form action="" method="post">
        <div class="table-container">
            <h1>Bảng hồ sơ học sinh</h1>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên học sinh</th>
                        <th>Tên ngành nộp hồ sơ</th>
                        <th>Tên khối xét hồ sơ</th>
                        <th>Tên người duyệt hồ sơ</th>
                        <th>Trạng thái hồ sơ</th>
                        <th>Thao tác</th>
                        <th>Chi tiết hồ sơ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 Example -->
                    <tr>
                        <td>1</td>
                        <td>Nguyễn Văn A</td>
                        <td>Khoa học Máy tính</td>
                        <td>A01</td>
                        <td>Nguyễn Thị B</td>
                        <td><span class="status-approved">Đã duyệt</span></td>
                        <td>
                            <button class="btn3 btn-approve">Duyệt</button>
                            <button class="btn3 btn-reject">Không duyệt</button>
                        </td>
                        <td>
                            <a href="student_detail.html?id=1" class="btn3 btn-details">Xem chi tiết</a>
                        </td>
                    </tr>
                    <!-- Row 2 Example -->
                    <tr>
                        <td>2</td>
                        <td>Trần Thị C</td>
                        <td>Kinh tế</td>
                        <td>D01</td>
                        <td>Nguyễn Văn D</td>
                        <td><span class="status-pending">Chưa duyệt</span></td>
                        <td>
                            <button class="btn3 btn-approve">Duyệt</button>
                            <button class="btn3 btn-reject">Không duyệt</button>
                        </td>
                        <td>
                            <a href="student_detail.html?id=2" class="btn3 btn-details">Xem chi tiết</a>
                        </td>
                    </tr>
                    <!-- Row 3 Example -->
                    <tr>
                        <td>3</td>
                        <td>Phạm Văn E</td>
                        <td>Quản trị Kinh doanh</td>
                        <td>C02</td>
                        <td>Lê Thị F</td>
                        <td><span class="status-rejected">Không duyệt</span></td>
                        <td>
                            <button class="btn3 btn-approve">Duyệt</button>
                            <button class="btn3 btn-reject">Không duyệt</button>
                        </td>
                        <td>
                            <a href="student_detail.html?id=3" class="btn3 btn-details">Xem chi tiết</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

</body>

</html>