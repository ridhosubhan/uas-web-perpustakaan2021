<?php 
    $title = 'Data Buku';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['buku'])){
        $kodebuku = $_GET['buku'];
        $query = "SELECT b.*, rak.nama, rak.lokasi FROM tb_buku b INNER JOIN tb_rak rak ON b.id_rak=rak.id WHERE b.kode_buku='$kodebuku'";
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>" class="active">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Buku dan Rak</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>views/buku" class="active">Data Buku</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Detail</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Buku <?=$data['judul']?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <img class="img-thumbnail img-fluid rounded" src="<?=BASEPATH?>/images/<?=$data['sampul']?>" width="200px">
                                </div>
                                <div class="col-sm-9">
                                    <form>
                                        <div class="form-group">
                                            <label>Kode Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['kode_buku']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['judul']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Penulis Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['penulis']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Penerbit Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['penerbit']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Terbit</label>  
                                            <input type="text" class="form-control" value="<?= $data['tahun_terbit']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['stok']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lokasi Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['lokasi']." &nbsp;&nbsp; ".$data['nama']?>" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
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