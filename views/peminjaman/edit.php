<?php 
    $title = 'Data Peminjaman';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    if (isset($_POST['simpan'])){
        $idpeminjaman = $_GET['peminjaman'];
        $tgl_pinjam = $_POST['_tanggal_pinjam'];
        $tgl_kembali = $_POST['_tanggal_kembali'];
        $id_buku = $_POST['_id_buku'];
        $id_anggota = $_POST['_id_anggota'];
        $id_petugas = $_POST['_id_petugas'];
        
        $query = "SELECT * from tb_peminjaman WHERE tanggal_pinjam='$tgl_pinjam' AND tanggal_kembali='$tgl_kembali' AND id_buku='$id_buku' AND id_anggota='$id_anggota' AND id_petugas='$id_petugas'";
        $result = execute_query($con, $query);
        if(mysqli_num_rows($result) >0){
            echo "
                <script>
                    window.location.href='index.php';
                    alert('Data Sudah Ada di Database');
                </script>
                ";
        } else {
            $query = "UPDATE tb_peminjaman SET tanggal_pinjam='$tgl_pinjam', tanggal_kembali='$tgl_kembali', id_buku='$id_buku', id_anggota='$id_anggota', id_petugas='$id_petugas' WHERE id='$idpeminjaman'";
            execute_query($con, $query);
            $_SESSION["suksesedit"] = "Berhasil Mengubah Data Petugas";
                echo "
                    <script>
                        window.location.href='index.php';
                    </script>
                ";
        }
    }
//kondisi ketika klik tombol edit untuk membawa parameter divisiid dari form sebelumnya
else if (isset($_GET['peminjaman'])) {
    $con = connect_db();
    $idpeminjaman = $_GET['peminjaman'];
    $query = "SELECT * FROM tb_peminjaman WHERE id = '$idpeminjaman'";
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
                                <li class="breadcrumb-item"><a href="#" class="active">Data Transaksi</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/peminjaman">Data Transaksi</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Edit Data Peminjaman</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Data Peminjaman</h4>
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
                                    <label>Tanggal Peminjaman</label> 
                                    <input name="_tanggal_pinjam" id="_tanggal_pinjam" type="date" class="form-control" value="<?= $data['tanggal_pinjam']?>" placeholder="Pilih Tanggal Peminjaman" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label> 
                                    <input name="_tanggal_kembali" id="_tanggal_kembali" type="date" class="form-control" value="<?= $data['tanggal_kembali']?>" placeholder="Pilih Tanggal Pengembalian" required>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label> 
                                        <select class="form-control select2" name="_id_buku" id="_id_buku">
                                            <option value="" disabled selected>Pilih Judul Buku</option>
                                            <?php
                                                $query = "SELECT * FROM tb_buku";
                                                $result = execute_query($con, $query);
                                                while($id_buku = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?= $id_buku['id_buku']?>"
                                                    <?php
                                                    if($id_buku['id'] == $data['id_buku']){
                                                        echo "selected";
                                                        }
                                                    ?>
                                                > <?=$id_buku['judul']?></option>   
                                                <?php
                                                    } 
                                                ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label> 
                                        <select class="form-control select2" name="_id_anggota" id="_id_anggota">
                                            <option value="" disabled selected>Pilih Nama Anggota</option>
                                            <?php
                                                $query = "SELECT * FROM tb_anggota";
                                                $result = execute_query($con, $query);
                                                while($id_anggota = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?= $id_anggota['id_anggota']?>"
                                                    <?php
                                                    if($id_anggota['id'] == $data['id_anggota']){
                                                        echo "selected";
                                                        }
                                                    ?>
                                                > <?=$id_anggota['nama']?></option>   
                                                <?php
                                                    } 
                                                ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Petugas</label> 
                                        <select class="form-control select2" name="_id_petugas" id="_id_petugas">
                                            <option value="" disabled selected>Pilih Nama Petugas</option>
                                            <?php
                                                $query = "SELECT * FROM tb_petugas";
                                                $result = execute_query($con, $query);
                                                while($id_petugas = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?= $id_petugas['id_petugas']?>"
                                                    <?php
                                                    if($id_petugas['id'] == $data['id_petugas']){
                                                        echo "selected";
                                                        }
                                                    ?>
                                                > <?=$id_petugas['nama']?></option>   
                                                <?php
                                                    } 
                                                ?>
                                        </select>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button type="button" id="btn_reset" onClick="window.location.reload();" class="btn btn-secondary">
                                        <i class="fa fa-refresh"></i> Reset
                                    </button>
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