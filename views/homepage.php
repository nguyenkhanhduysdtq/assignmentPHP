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
            <?php

            if ($_SESSION["user"]->getter_role() == 5) {
            ?>
                <nav class="navbar">
                    <ul class="navbar__list">
                        <li>
                            <a href="../navigation/index.php?layer=file&&action=getAllFile" class="navbar__item">Xem thông tin hồ sơ đã nộp</a>
                        </li>

                    </ul>
                </nav>

            <?php } ?>


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

    <div class="container mt-5 mb-5 d-flex justify-content-center">

        <h1 class="title">Danh sách các ngành xét tuyển</h1>




        <div class="card px-1 py-4 wrapped">

            <?php
            foreach ($listField as $field) {
            ?>


                <form action="../navigation/index.php?layer=file&&action=getfileOfField" method="post">
                    <div class="card-body">

                        <h3 style="text-align: center; padding-bottom: 30px;">Ngành <?php echo $field->getter_id() ?></h3>

                        <h5 class="information1">* Thông tin chi tiết</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p><strong>Ngành:</strong> <?php echo htmlspecialchars($field->getter_nameField()); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p><strong>Khối:</strong> <?php echo htmlspecialchars($field->getter_group()->getter_nameGroup()); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p><strong>Ngày Mở:</strong> <?php echo htmlspecialchars($field->getter_start_time()); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p><strong>Ngày kết thúc: </strong><?php echo htmlspecialchars($field->getter_end_time()); ?></p>
                                </div>
                            </div>
                        </div>

                        <button style="color: <?php $endDateTime = new DateTime($field->getter_end_time());
                                                $currentDateTime = new DateTime();
                                                $startDateTime = new DateTime($field->getter_start_time());
                                                if ($endDateTime <  $currentDateTime || $startDateTime > $currentDateTime && $_SESSION["user"]->getter_role() == 5) {
                                                    echo "red;";
                                                    echo  "cursor: not-allowed;";
                                                } else {
                                                    echo "";
                                                } ?>;  "

                            class="submit" <?php
                                            $endDateTime = new DateTime($field->getter_end_time());
                                            $startDateTime = new DateTime($field->getter_start_time());
                                            $currentDateTime = new DateTime();
                                            if ($endDateTime <  $currentDateTime || $startDateTime > $currentDateTime  && $_SESSION["user"]->getter_role() == 5) {
                                                echo "disabled";
                                            } else {
                                                echo "";
                                            }

                                            ?>

                            name="<?php

                                    if ($_SESSION["user"]->getter_role() == 3) {
                                        echo "submit";
                                    } else {
                                        echo "submit_t";
                                    }

                                    ?>">
                            <?php
                            $endDateTime = new DateTime($field->getter_end_time());
                            $currentDateTime = new DateTime();
                            $startDateTime = new DateTime($field->getter_start_time());
                            if ($endDateTime >  $currentDateTime && $_SESSION["user"]->getter_role() == 3) {
                                echo "Nộp hồ sơ";
                            } elseif ($endDateTime <  $currentDateTime && $_SESSION["user"]->getter_role() == 5) {
                                echo "Đã hết hạn";
                            } elseif ($startDateTime > $currentDateTime  && $_SESSION["user"]->getter_role() == 5) {
                                echo "Chưa đến ngày";
                            }


                            ?></button>
                    </div>

                    <input type="hidden" name="value_id" value="<?php echo $field->getter_id(); ?>">
                </form>
            <?php
            }
            ?>

        </div>
    </div>

</body>

</html>