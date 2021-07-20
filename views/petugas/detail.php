<?php 
    $title = 'Data Petugas';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['petugas'])){
        $idpetugas = $_GET['petugas'];
        $query = "SELECT * FROM tb_petugas WHERE id='$idpetugas'";
        $result = execute_query($con, $query);
        $data = mysqli_fetch_array($result);
?>

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/petugas">Data Petugas</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Detail Petugas</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Petugas <?= $data['nama']?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?= tambah();?>
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Petugas</label> 
                                    <input name="_nama" id="_nama" value="<?=$data['nama']?>" type="text" class="form-control" placeholder="Ketik Nama Petugas" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label> 
                                    <input name="_jabatan" id="_jabatan" value="<?=$data['jabatan']?>" type="text" class="form-control" placeholder="Ketik Nama Petugas" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label> 
                                    <input name="_notelp" id="_notelp" value="<?=$data['no_telp']?>"type="text" class="form-control hanyaAngka" placeholder="Ketik Nomor Telepon" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label> 
                                    <textarea name="_alamat" id="_alamat" class="form-control" rows="5" placeholder="Ketik Alamat Lengkap" readonly><?=$data['alamat']?></textarea>
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