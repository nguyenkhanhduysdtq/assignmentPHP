<!DOCTYPE html>
<html lang="en">



<head>
    <link rel="stylesheet" href="../assets/css/homeAdmin.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <a href="#!" class="navbar__item">Item 1</a>
                    </li>
                    <li>
                        <a href="#!" class="navbar__item">Quản lý </a>
                    </li>
                    <li>
                        <a href="#!" class="navbar__item">Thông tin tài khoản</a>
                    </li>
                    <li>
                        <a href="#!" class="navbar__item">Xem thông tin cá nhân</a>
                    </li>
                </ul>
            </nav>

            <div class="header-action">
                <?php
                if (isset($_SESSION["user"])) {
                    echo "<p>{$_SESSION['user']->getter_fullname()}</p>";
                }

                ?>
            </div>
        </div>
    </header>

    <div class="container mt-5 mb-5 d-flex justify-content-center">

        <h5 class="information1 amend_title">* Thêm ngành</h5>
        <input type="submit" class="add__major" name="add__major" value="Thêm ngành xét tuyển">

        <h1 class="title">Danh sách các ngành xét tuyển</h1>

        <div class="card px-1 py-4 wrapped">

            <?php
            foreach ($listField as $field) {
            ?>
                <div class="card-body">

                    <div class="list_function">
                        <div>
                            <h5 class="information1">* Trạng thái</h5>
                        </div>

                        <div class="submit_type">
                            <input class="activity_edit" type="submit" value="sửa">
                            <input class="activity_delete" type="submit" value="xóa">
                        </div>
                    </div>

                    <div class="d-flex flex-row activity">
                        <label class="radio mr-1">
                            <input type="radio" name="add_<?php echo $field->getter_id(); ?>" value="<?php echo $field->getter_status(); ?>" <?php echo $field->getter_status() == '1' ? 'checked' : ''; ?>>
                            <span><i class="fa fa-user"></i> Mở</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="add_<?php echo $field->getter_id(); ?>" value="<?php echo $field->getter_status(); ?>" <?php echo $field->getter_status() == '0' ? 'checked' : ''; ?>>
                            <span><i class="fa fa-plus-circle"></i> Đóng</span>
                        </label>
                    </div>

                    <h5 class="information1">* Thông tin chi tiết</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>Ngành: <?php echo htmlspecialchars($field->getter_nameField()); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>Khối: <?php echo htmlspecialchars($field->getter_group()->getter_nameGroup()); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>Ngày kết thúc: <?php echo htmlspecialchars($field->getter_end_time()); ?></p>
                            </div>
                        </div>
                    </div>

                    <button class="submit">Nộp hồ sơ</button>
                    <button class="submit_detail">Xem thông tin chi tiết</button>
                </div>
            <?php
            }
            ?>

            <!-- <div class="card-body">

                <div class="list_function">
                    <div>
                        <h5 class="information1">* Trạng thái</h5>
                    </div>

                    <div class="submit_type">
                        <input class="activity_edit" type="submit" value="sửa">
                        <input class="activity_delete" type="submit" value="xóa">

                    </div>
                </div>
                <div class="d-flex flex-row activity"> <label class="radio mr-1">
                        <input type="radio" name="add" value="anz" checked> <span> <i class="fa fa-user"></i> Mở</span> </label>
                    <label class="radio"> <input type="radio" name="add" value="add"> <span> <i class="fa fa-plus-circle"></i> Đóng</span> </label>
                </div>
                <h5 class="information1">* Thông tin chi tiết</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <p>Ngành : công nghệ thông tin</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <p>Khối : A1</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <p>Ngày kết thúc : 11/1/2003</p>
                        </div>
                    </div>
                </div>
                <button class="submit">Nộp hồ sơ</button>
                <button class="submit_detail">Xem thông tin chi tiết</button>
            </div> -->

        </div>
    </div>

</body>

</html>