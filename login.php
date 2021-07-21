<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> Login - Sistem Informasi Perpustakaan</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0">
                        <a href="" class="logo logo-admin"><i class="mdi mdi-book-open-page-variant"></i> Perpustakaan</a>
                    </h3>

                    <div class="p-3">
                    <?php
                        if(isset($_POST['login'])){
                            $username = $_POST['_username'];
                            $password = $_POST['_password'];
                            
                            if(empty($username) || empty($password)){
                                echo "<script>alert('Username dan password tidak bisa kosong bos');</script>";
                            }else{
                                include 'konfigurasi/config.php';
                                include 'konfigurasi/function.php'; 

                                $conn = connect_db();
                                $query = "SELECT * FROM tb_user WHERE username='$username'";
                                $result = execute_query($conn, $query);
                                $data = mysqli_fetch_assoc($result);
                                
                                $password_verify =$data['password'];
                                if(mysqli_num_rows($result)>0){
                                    $cekusername = $data['username'];
                                    if( ($username==$cekusername) && (password_verify($password,$password_verify)) ){
                                        session_start();
                                        $_SESSION['isLogin'] = true;
                                        $_SESSION['isUsername'] = $data['username'];
                                        $_SESSION['isRole'] = $data['role'];
                                        // header("location:index.php");
                                        echo"<script>
                                                window.location.href='index.php';
                                            </script>";
                                        print_r($_SESSION);
                                    }else{
                                        echo "<script>alert('Password Salah');</script>";
                                    }
                                }else{
                                    echo "<script>alert('Username tidak ditemukan');</script>";
                                }
                            }
                        }
                    ?>
                        <form class="form-horizontal m-t-20" method="POST">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="_username" type="text" required placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="_password" type="password" required placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" name="login" value="Login" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group mb-0 row float-right">
                                <div class="col-sm-12">
                                    <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>