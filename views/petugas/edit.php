<?php 
    $title = 'Data Petugas';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    if (isset($_POST['simpan'])){
        $idpetugas = $_GET['petugas'];
        $nama = $_POST['_nama'];
        $jabatan = $_POST['_jabatan'];
        $notelp = $_POST['_notelp'];
        $alamat = $_POST['_alamat'];
        
        $query = "SELECT * from tb_petugas WHERE nama='$nama' AND jabatan='$jabatan' AND no_telp='$notelp' AND alamat='$alamat'";
        $result = execute_query($con, $query);
        if(mysqli_num_rows($result) >0){
            echo "
                <script>
                    window.location.href='index.php';
                    alert('Data Sudah Ada di Database');
                </script>
                ";
        } else {
            $query = "UPDATE tb_petugas SET nama='$nama', jabatan='$jabatan', no_telp='$notelp', alamat='$alamat' WHERE id = '$idpetugas'";
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
else if (isset($_GET['petugas'])) {
    $con = connect_db();
    $idpetugas = $_GET['petugas'];
    $query = "SELECT * FROM tb_petugas WHERE id = '$idpetugas'";
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
                                <li class="breadcrumb-item"><a href="#" class="active">Edit Data Petugas</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Data Petugas</h4>
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
                                    <label>Nama Petugas</label> 
                                    <input name="_nama" id="_nama" type="text" value="<?=$data['nama']?>" class="form-control" placeholder="Ketik Nama Petugas" required>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label> 
                                        <select class="form-control select2" name="_jabatan" id="_jabatan" required>
                                            <option value="" disabled selected>Pilih Jabatan</option>
                                            <option value="Manager" <?= $data['jabatan']=='Manager' ? 'selected' : ''; ?>> Manager </option>   
                                            <option value="Supervisor" <?= $data['jabatan']=='Supervisor' ? 'selected' : ''; ?>> Supervisor</option>   
                                            <option value="Staff" <?= $data['jabatan']=='Staff' ? 'selected' : ''; ?>> Staff</option>   
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label> 
                                    <input name="_notelp" id="_notelp" type="text" value="<?=$data['no_telp']?>" class="form-control hanyaAngka" placeholder="Ketik Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label> 
                                    <textarea name="_alamat" id="_alamat" class="form-control" rows="5" placeholder="Ketik Alamat Lengkap" required><?=$data['alamat']?></textarea>
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