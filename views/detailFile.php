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

                <?php
                $count = 1;
                foreach ($fildeDetail as $file) {
                ?>

                    <form action="../navigation/index.php?layer=file&&action=fileDetail" method="post">
                        <!-- Row 1 Example -->
                        <tr>
                            <td>
                                <?php echo $count++ ?>
                            </td>
                            <td><?php echo $file->fullname ?></td>
                            <td><?php echo $file->name_field ?></td>
                            <td><?php echo $file->group->getter_nameGroup() ?></td>
                            <td><?php echo $userAccept ?></td>
                            <td><span class="<?php
                                                if ($file->status == 0) {
                                                    echo "status-pending";
                                                } else if ($file->status == 1) {
                                                    echo "status-approved";
                                                } else {
                                                    echo "status-rejected";
                                                }

                                                ?>">
                                    <?php
                                    if ($file->status == 0) {
                                        echo "Chưa duyệt";
                                    } else if ($file->status == 1) {
                                        echo "Đã duyệt";
                                    } else {
                                        echo "Không duyệt";
                                    }

                                    ?>
                                </span></td>
                            <td>
                                <button class="btn3 btn-approve">Duyệt</button>
                                <button class="btn3 btn-reject">Không duyệt</button>
                            </td>
                            <td>

                                <button name="submit_tc" class="btn3 btn-details">Xem chi tiết</button>

                            </td>
                            <input type="hidden" name="value_id" value="<?php echo $fieldId ?>">
                            <input type="hidden" name="value_user_id" value="<?php echo $file->user_id ?>">
                        </tr>
                    </form>
                <?php
                }
                ?>


            </tbody>
        </table>
    </div>


</body>

</html>