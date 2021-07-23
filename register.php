<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> Registrasi - Sistem Informasi Perpustakaan</title>
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

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="" class="logo logo-admin"><i class="mdi mdi-book-open-page-variant"></i> Perpustakaan</a>
                    </h3>

                    <div class="p-3">
                    <?php
                    function idanggota(){
                        // mengambil data barang dengan kode paling besar
                        $con = connect_db();
                        $query = "SELECT max(kode_anggota) as kodeTerbesar FROM tb_anggota";
                        $result = execute_query($con, $query);

                        $data = mysqli_fetch_array($result);

                        $kodeAnggota = $data['kodeTerbesar'];

                        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                        // dan diubah ke integer dengan (int)
                        $urutan = (int) substr($kodeAnggota, 4, 4);

                        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                        $urutan++;
                        
                        // membentuk kode barang baru
                        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                        $huruf = "ANG-";
                        $kodeAnggota = $huruf . sprintf("%04s", $urutan);
                        return $kodeAnggota;
                    }
                    
                    include 'konfigurasi/config.php';
                    include 'konfigurasi/function.php';
                    // include 'views/anggota/controller.php';
                    $con = connect_db();

                    if(isset($_POST['simpan'])){
                        $username = $_POST['_username'];
                        $password = password_hash($_POST['_password'],PASSWORD_DEFAULT);
                        $role = 'Anggota';

                        $kode_anggota = idanggota();
                        $nama = $_POST['_nama'];
                        $jenkel = $_POST['_jenkel'];
                        $notelp = $_POST['_notelp'];
                        $alamat = $_POST['_alamat'];
                        if(!empty($kode_anggota)){
                            $query = "SELECT * from tb_user WHERE username='$username'";
                            $result = execute_query($con, $query);
                            if(mysqli_num_rows($result) > 0){
                                echo "
                                    <script>
                                        window.location.href='register.php';
                                        alert('Username Sudah Ada di Database');
                                    </script>";
                            } else {
                                // INSERT KE TB_ANGGOTA
                                $queries = "INSERT INTO `tb_anggota` (`kode_anggota`, `nama`, `jenkel`, `no_telp`, `alamat`, `status_akun`) VALUES ('$kode_anggota', '$nama', '$jenkel', '$notelp', '$alamat', '1')";
                                $results = execute_query($con, $queries);
                                
                                // SELECT ID ANGGOTA YANG BARU AJA DIINSERT
                                $query = "SELECT * from tb_anggota WHERE kode_anggota='$kode_anggota'";
                                $result = execute_query($con, $query);
                                $data = mysqli_fetch_array($result);
                                $id_anggota = $data['id'];
                                
                                $queri = "INSERT INTO `tb_user` (`username`, `password`, `role`, `relasi`) VALUES ('$username', '$password', '$role', '$id_anggota')";
                                $result = execute_query($con, $queri);
                                if (mysqli_affected_rows($con) >0){
                                    echo "
                                        <script>
                                            alert('Berhasil registrasi!! Silakan Login');
                                            window.location.href='login.php';
                                        </script>
                                    ";
                                }   
                            }
                        }
                    }
                    ?>
                        <form class="form-horizontal" name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">

                            <div class="form-group">
                                <input name="_anggota" id="_anggota" value="<?=idanggota();?>" type="hidden" class="form-control" placeholder="ID Anggota" required readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Username <?=idanggota()?></label> 
                                <input class="form-control" name="_username" id="_username" type="text" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label> 
                                <input class="form-control" name="_password" id="_password" type="password" placeholder="Password" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Nama Anggota</label> 
                                <input name="_nama" id="_nama" type="text" class="form-control" placeholder="Ketik Nama Anggota" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label> 
                                    <select class="form-control" name="_jenkel" id="_jenkel" required>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="L"> Laki - Laki</option>   
                                        <option value="P"> Perempuan</option>   
                                    </select>
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label> 
                                <input name="_notelp" id="_notelp" type="text" class="form-control hanyaAngka" placeholder="Ketik Nomor Telepon" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label> 
                                <textarea name="_alamat" id="_alamat" class="form-control" rows="5" placeholder="Ketik Alamat Lengkap" required></textarea>
                            </div>

                            <div class="form-group">
                                <input name="_kodeanggota" id="_kodeanggota" type="hidden" value="<?=idanggota();?>" class="form-control" placeholder="Kode Anggota" required readonly>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" value="simpan" name="simpan" id="simpan" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <a href="login.php" class="text-muted">Already have account?</a>
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