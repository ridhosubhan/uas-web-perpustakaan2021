<?php 
    $title = 'Data Rak';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';

    //EDIT
    if (isset($_POST['simpan'])){
        //ambil variabel dari tambah.php untuk divisi
        $kodeanggota = $_GET['anggota'];
        $nama = $_POST['_nama'];
        $jenkel = $_POST['_jenkel'];
        $notelp = $_POST['_notelp'];
        $alamat = $_POST['_alamat'];
        
        //cek jika kode divisi sudah digunakan pada row yang lain, maka kode tidak boleh sama
        $query = "SELECT * from tb_anggota WHERE nama='$nama' AND jenkel='$jenkel' AND no_telp='$notelp' AND alamat='$alamat'";
        $result = execute_query($con, $query);
        if(mysqli_num_rows($result) >0){
            echo "
                    <script>
                        alert('Data Sudah Ada di Database!');
                    </script>
                ";
        } else {
            $query = "UPDATE tb_anggota SET nama = '$nama', jenkel = '$jenkel', no_telp='$notelp', alamat='$alamat' WHERE kode_anggota = '$kodeanggota'";
            execute_query($con, $query);
            $_SESSION["suksesedit"] = "Berhasil Mengubah Data Anggota";
                echo "
                    <script>
                        window.location.href='index.php';
                    </script>
                ";
        }
    }
//kondisi ketika klik tombol edit untuk membawa parameter divisiid dari form sebelumnya
elseif (isset($_GET['anggota'])) {
    $con = connect_db();
    $kodeanggota = $_GET['anggota'];
    $query = "SELECT * FROM tb_anggota WHERE kode_anggota = '$kodeanggota'";
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/buku" class="active">Data Anggota</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Edit Data Anggota</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Data Anggota <?=$data['kode_anggota']?> </h4>
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
                                    <label>Kode Anggota</label> 
                                    <input name="_kodeanggota" id="_kodeanggota" type="text" value="<?=$data['kode_anggota']?>" class="form-control" placeholder="Kode Anggota" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label> 
                                    <input name="_nama" id="_nama" type="text" value="<?=$data['nama']?>" class="form-control" placeholder="Ketik Nama Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label> 
                                        <select class="form-control" name="_jenkel" id="_jenkel" required>
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L" <?= $data['jenkel']=='L' ? 'selected' : ''; ?>> Laki - Laki</option>   
                                            <option value="P" <?= $data['jenkel']=='P' ? 'selected' : ''; ?>> Perempuan</option>   
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label> 
                                    <input name="_notelp" id="_notelp" type="text" value="<?=$data['no_telp']?>" class="form-control" placeholder="Ketik Nomor Telepon" required>
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