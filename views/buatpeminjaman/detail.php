<?php 
    $title = 'Buat Peminjaman';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['peminjaman'])){
        $idpeminjaman = $_GET['peminjaman'];
        $query = "SELECT * FROM tb_buku WHERE id='$idpeminjaman'";
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
                                <li class="breadcrumb-item"><a href="#" class="active">Data Transaksi</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>views/peminjaman" class="active">Peminjaman</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Detail</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Peminjaman Buku <?=$data['judul']?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img class="img-thumbnail img-fluid rounded" src="<?=BASEPATH?>/images/<?=$data['sampul']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Kode Buku</label>  
                                                    <input type="text" class="form-control" value="<?= $data['kode_buku']?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Judul Buku</label>  
                                                    <input type="text" class="form-control" value="<?= $data['judul']?>" readonly>
                                                </div>
                                            </div>
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