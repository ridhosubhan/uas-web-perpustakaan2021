<?php 
    $title = 'Data Pengembalian';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['pengembalian'])){
        $idpengembalian = $_GET['pengembalian'];
        $query = "SELECT p.*, buku.judul, anggota.kode_anggota, petugas.nama FROM tb_pengembalian p JOIN tb_buku buku ON p.id_buku=buku.id JOIN tb_anggota anggota ON p.id_anggota=anggota.id JOIN tb_petugas petugas ON p.id_petugas=petugas.id WHERE p.id='$idpengembalian'";
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>views/pengembalian" class="active">Data Pengembalian</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Detail</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Pengembalian Buku <?=$data['judul']?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <form>
                                        <div class="form-group">
                                            <label>Tanggal Pengembalian</label>  
                                            <input type="text" class="form-control" value="<?= $data['tanggal_pengembalian']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Denda (Rp.)</label>  
                                            <input type="text" class="form-control" value="<?= $data['denda']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Buku</label>  
                                            <input type="text" class="form-control" value="<?= $data['judul']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Anggota Peminjam</label>  
                                            <input type="text" class="form-control" value="<?= $data['kode_anggota']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Petugas</label>  
                                            <input type="text" class="form-control" value="<?= $data['nama']?>" readonly>
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