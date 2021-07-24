<?php 
    $title = 'Profile';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    data_akun();
    $con = connect_db();

    include '../../layouts/header.php';

?>

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Pengaturan</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/profile" class="active">Profile</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile <?= $_SESSION['isRole']=='Anggota' ? $profile_anggota['nama']: $profile_petugas['nama']; ?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="page-title">Data Pribadi</h5>
                            <?php if($_SESSION['isRole']=='Anggota'):?>    
                            <div class="form-group">
                                <label>Kode Anggota</label> 
                                <input name="_kodeanggota" id="_kodeanggota" type="text" value="<?=$profile_anggota['kode_anggota']?>" class="form-control" placeholder="Kode Anggota" required disabled>
                            </div>
                            <?php endif;?>
                            <div class="form-group">
                                <label>Nama</label> 
                                <input name="_nama" id="_nama" type="text" value="<?= $_SESSION['isRole']=='Anggota' ? $profile_anggota['nama']: $profile_petugas['nama']; ?>" class="form-control" placeholder="Ketik Nama Anggota" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label> 
                                <input name="_notelp" id="_notelp" type="text" value="<?= $_SESSION['isRole']=='Anggota' ? $profile_anggota['no_telp']: $profile_petugas['no_telp']; ?>" class="form-control" placeholder="Ketik Nomor Telepon" disabled>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label> 
                                <textarea name="_alamat" id="_alamat" class="form-control" rows="5" placeholder="Ketik Alamat Lengkap" disabled><?= $_SESSION['isRole']=='Anggota' ? $profile_anggota['alamat']: $profile_petugas['alamat']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="page-title">Data Akun</h5>
                            <?php
                                if(isset($_POST['simpan'])){
                                    $username = $_SESSION['isUsername'];
                                    $password = password_hash($_POST['_password'],PASSWORD_DEFAULT);
                                    
                                    if(empty($username) || empty($password)){
                                        echo "<script>alert('Username dan password tidak bisa kosong bos');</script>";
                                    }else{
                                        $query = "UPDATE tb_user SET password = '$password' WHERE username = '$username'";
                                        execute_query($con, $query);
                                            echo "
                                                <script>
                                                    alert('Berhasil Ganti Password');
                                                    window.location.href='index.php';
                                                </script>
                                            ";
                                    }
                                } 
                            ?>
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username</label> 
                                    <input class="form-control" name="_username" type="text" value="<?= $_SESSION['isUsername']?>" required disabled placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label> 
                                    <input class="form-control" name="_password" type="password" required placeholder="Isi Untuk Ganti Password">
                                </div>
                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" name="simpan" value="simpan" type="submit">Ganti Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
                                                            
        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

<?php 
include '../../layouts/footer.php';
?>