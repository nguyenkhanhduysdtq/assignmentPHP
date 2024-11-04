<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/formField.css">
    <link rel="stylesheet" href="../assets/css/globs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>




<body class="field">

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
                <?php
                if (isset($_SESSION["user"])) {
                    echo "<p>{$userOnline->getter_fullname()}</p>";
                }

                ?>
            </div>
        </div>
    </header>

    <div class="form_page">
        <div class="form_container">
            <h1>Thêm ngành xét tuyển</h1>
            <form action="../navigation/index.php?layer=field&&action=addField" method="post">
                <div class="form_group">
                    <label for="nganh">Ngành xét tuyển</label>
                    <select id="khoi" name="major">
                        <option value="0">.....</option>
                        <?php
                        foreach ($listField as $field) {
                        ?>
                            <option value="<?php echo $field->getter_id() ?>"><?php echo $field->getter_nameField() ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form_group">
                    <label for="start_date">Thời Gian Bắt Đầu</label>
                    <input type="date" id="start_date" name="start_date">
                </div>
                <div class="form_group">
                    <label for="end_date">Thời Gian Kết Thúc</label>
                    <input type="date" id="end_date" name="end_date">
                </div>
                <div class="form_group">
                    <label for="khoi">Khối Xét Tuyển</label>
                    <select id="khoi" name="group">
                        <option value="0">.....</option>
                        <?php
                        foreach ($listGroup as $examGroup) {
                        ?>
                            <option value="<?php echo $examGroup->getter_id() ?>"><?php echo $examGroup->getter_nameGroup() ?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>
                <button class="submit" name="submitAddField" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</body>

</html>