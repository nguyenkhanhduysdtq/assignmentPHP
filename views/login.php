<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../css/loginStyles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>


    <form action="../navigation/index.php?layer=authen&&action=login" method="post">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6 ">
                        <img class="titleImage" src="../image/login.jpg"
                            class="img-fluid" alt="Phone image">
                    </div>
                    <div class="wrapper col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <div>
                            <?php
                            if (isset($error)) {
                                echo  $error;
                            } else {
                                $error = "";
                            }
                            ?>
                            <h1>Đăng nhập</h1>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form1Example13" class="form-control form-control-lg" placeholder="Username" name="username" />
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="form1Example23" class="form-control form-control-lg" placeholder="Password" name="password" />
                            </div>

                            <div class="check-login d-flex justify-content-around align-items-center mb-4">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                </div>
                                <a href="#!">Forgot password?</a>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" name="submit-login">Đăng nhập</button>

                            <p class="sign-up">Bạn chưa có tài khoản?<a href=""> Đăng ký</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </form>

</body>

</html>