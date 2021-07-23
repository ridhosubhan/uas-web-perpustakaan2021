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
                        <h4 class="page-title">Pinjam Buku <?=$data['judul']?> </h4>
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
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Kode Buku</label>  
                                                <input type="text" class="form-control" value="<?= $data['kode_buku']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>Judul Buku</label>  
                                                <input type="text" class="form-control" value="<?= $data['judul']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Penulis Buku</label>  
                                                <input type="text" class="form-control" value="<?= $data['penulis']?>" readonly>
                                            </div>    
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Penerbit Buku</label>  
                                                <input type="text" class="form-control" value="<?= $data['penerbit']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tahun Terbit</label>  
                                                <input type="text" class="form-control" value="<?= $data['tahun_terbit']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Buku</label>  
                                        <input type="text" class="form-control" value="<?= $data['stok']?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                        if(isset($_POST['simpan'])){
                                            data_akun();
                                            $kodebuku = $data['id'];
                                            $tanggal_pinjam = date('Y-m-d', time());
                                            $tanggal_kembali = date('Y-m-d', strtotime("+7 day", time()));
                                            $idanggota = $_POST['_anggota'];
                                            $idpetugas = $profile_petugas['id'];
                                    
                                            $qry = "SELECT * FROM tb_buku WHERE kode_buku='$kodebuku'";
                                            $result = execute_query($con, $qry);
                                            $data = mysqli_fetch_assoc($result);
                                    
                                            if($data['stok']<0){
                                                echo "
                                                    <script>
                                                        window.location.href='index.php';
                                                        alert('Stok Buku Kosong. Tidak bisa meminjam');
                                                    </script>";
                                            }else{
                                                $queri = "INSERT INTO `tb_peminjaman` (`tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES ('$tanggal_pinjam', '$tanggal_kembali', '$kodebuku','$idanggota','$idpetugas')";
                                                $result = execute_query($con, $queri);
                                                if (mysqli_affected_rows($con) !=0){
                                                    $queris = "UPDATE tb_buku SET stok=stok-1 WHERE id='$kodebuku'";
                                                    $results = execute_query($con, $queris);
                                                    $_SESSION["suksestambah"] = "Berhasil Memproses Data";
                                                    $_SESSION["suksesmohon"] = "Sukses Meminjam Buku!!";
                                                    echo "
                                                        <script>
                                                            window.location.href='index.php';
                                                        </script>
                                                    ";
                                                }
                                            }
                                        }
                                    ?>
                                    <form name="formtambah" id="formtambah" method="post" class="form-group">
                                        <div class="form-group">
                                            <label>Data Anggota</label>  
                                            <select class="form-control select2" name="_anggota" id="_anggota">
                                                <option value="" disabled selected>Pilih Nama Anggota</option>
                                                <?php
                                                    $query = "SELECT * FROM tb_anggota";
                                                    $result = execute_query($con, $query);
                                                    while($idanggota = mysqli_fetch_array($result)){
                                                ?>
                                                    <option value="<?= $idanggota['id']?>"> <?=$idanggota['kode_anggota']."&nbsp; &nbsp;".$idanggota['nama']?></option>   
                                                <?php
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pinjam</label>  
                                            <input type="text" class="form-control" value="<?= date("l, d-F-Y", strtotime(date('Y-m-d', time())) )?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Kembali</label>  
                                            <input type="text" class="form-control" value="<?= date('l, d-F-Y"', strtotime("+7 day", time())) ?>" readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group float-right">
                                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                                        <i class="mdi mdi-content-save"></i> Pinjam
                                                    </button>
                                                    <button type="button" id="btn_reset" onClick="window.location.reload();" class="btn btn-secondary">
                                                        <i class="fa fa-refresh"></i> Reset
                                                    </button>
                                                </div>
                                            </div>
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