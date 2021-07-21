<?php 
    $title = 'Data Anggota';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['anggota'])){
        $kodeanggota = $_GET['anggota'];
        $query = "SELECT * FROM tb_anggota WHERE kode_anggota='$kodeanggota'";
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
                                <li class="breadcrumb-item"><a href="#" class="active">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/buku" class="active">Data Anggota</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Detail Anggota</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Anggota <?=$data['kode_anggota']?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Kode Anggota</label> 
                                            <input name="_kodeanggota" id="_kodeanggota" type="text" value="<?=$data['kode_anggota']?>" class="form-control" placeholder="Kode Anggota" readonly readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Anggota</label> 
                                            <input name="_kodeanggota" id="_kodeanggota" type="text" value="<?=$data['nama']?>" class="form-control" placeholder="Kode Anggota" readonly readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label> 
                                            <input name="_nama" id="_nama" type="text" value="<?= $data['jenkel']=='L' ? 'Laki-Laki' : 'Perempuan'; ?>" class="form-control" placeholder="Ketik Nama Anggota" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon</label> 
                                            <input name="_notelp" id="_notelp" type="text" value="<?=$data['no_telp']?>" class="form-control" placeholder="Ketik Nomor Telepon" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label> 
                                            <textarea name="_alamat" id="_alamat" class="form-control" rows="5" placeholder="Ketik Alamat Lengkap" readonly><?=$data['alamat']?></textarea>
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