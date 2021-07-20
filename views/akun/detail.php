<?php 
    $title = 'Data Akun';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['user'])){
        $id_user = $_GET['user'];
        $query = "SELECT * FROM tb_user WHERE id='$id_user'";
        $result = execute_query($con, $query);
        $data = mysqli_fetch_array($result);

        $anggota="";
        $petugas="";
        if($data['role']=='Anggota'){
            $queri = "SELECT tb_anggota.* FROM tb_user JOIN tb_anggota on tb_user.relasi=tb_anggota.id WHERE tb_user.id ='$id_user'";
            $results = execute_query($con, $queri);
            $anggota = mysqli_fetch_array($results);
        }else{
            $queri = "SELECT tb_petugas.* FROM tb_user JOIN tb_petugas on tb_user.relasi=tb_petugas.id WHERE tb_user.id ='$id_user'";
            $results = execute_query($con, $queri);
            $petugas = mysqli_fetch_array($results);
        }
        
?>

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>views/akun">Data Akun</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Detail Data Akun</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Data Akun</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama</label> 
                                    <input type="text" class="form-control" value="<?= $data['role']=='Anggota' ? $anggota['nama'] : $petugas['nama']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label> 
                                    <input type="text" class="form-control" value="<?= $data['role']=='Anggota' ? 'Anggota' : $petugas['jabatan']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label> 
                                    <input type="text" class="form-control" value="<?= $data['role']=='Anggota' ? $anggota['no_telp'] : $petugas['no_telp']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label> 
                                    <textarea class="form-control" rows="2" readonly><?= $data['role']=='Anggota' ? $anggota['alamat'] : $petugas['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Username</label> 
                                    <input type="text" class="form-control" value="<?=$data['username']?>" readonly>
                                </div>
                                <div class="form-group _rolePetugas">
                                    <label>Role</label> 
                                    <input type="text" class="form-control" value="<?=$data['role']?>" readonly>
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
}else{
    header("location: index.php");
}

include '../../layouts/footer.php';
?>