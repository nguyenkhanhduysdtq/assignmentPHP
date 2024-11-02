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
                        <a href="#!" class="navbar__item">Item 2</a>
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
                <p>Nguyễn Khánh Duy</p>
            </div>
        </div>
    </header>

    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <h1 class="title">Danh sách các ngành xét tuyển</h1>

        <div class="card px-1 py-4 wrapped">
            <div class="card-body">
                <h5 class="information1">* Trạng thái</h5>
                <div class="d-flex flex-row activity"> <label class="radio mr-1">
                        <input type="radio" name="add" value="anz" checked> <span> <i class="fa fa-user"></i> Hiện</span> </label>
                    <label class="radio"> <input type="radio" name="add" value="add"> <span> <i class="fa fa-plus-circle"></i> ẩn</span> </label>
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
            </div>
            <!-- title 2 -->
            <div class="card-body">
                <h5 class="information1">* Trạng thái</h5>
                <div class="d-flex flex-row activity"> <label class="radio mr-1">
                        <input type="radio" name="add1" value="anz" checked> <span> <i class="fa fa-user"></i> Hiện</span> </label>
                    <label class="radio"> <input type="radio" name="add1" value="add"> <span> <i class="fa fa-plus-circle"></i> ẩn</span> </label>
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
            </div>
        </div>
    </div>

</body>

</html>