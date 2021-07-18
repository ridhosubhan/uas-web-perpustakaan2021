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
        $id = $_GET['rak'];
        $nama = $_POST['_nama'];
        $lokasi = $_POST['_lokasi'];
        //kondisi yang harus dicek ketika edit data
        if (empty($nama)) {
            echo "
                <script>
                    alert('Nama harus diisi');
                </script>";
        } elseif (empty($lokasi)) {
            echo "
                <script>
                    alert('Nama harus diisi');
                </script>";
        } else {
            //cek jika kode divisi sudah digunakan pada row yang lain, maka kode tidak boleh sama
            $query = "SELECT id FROM tb_rak WHERE lokasi = '$lokasi' AND id <> '$id'";
            $result = execute_query($con, $query);
            if(mysqli_num_rows($result) !=0){
                echo "
                        <script>
                            alert('Lokasi tidak boleh sama');
                        </script>
                    ";
            } else {
                $query = "UPDATE tb_rak SET nama = '$nama', lokasi = '$lokasi' WHERE id = '$id'";
                execute_query($con, $query);
                $_SESSION["suksesedit"] = "Berhasil Mengubah Data Rak";
                    echo "
                        <script>
                            window.location.href='index.php';
                        </script>
                    ";
            }
        }
    }
//kondisi ketika klik tombol edit untuk membawa parameter divisiid dari form sebelumnya
elseif (isset($_GET['rak'])) {
    $con = connect_db();
    $id = $_GET['rak'];
    $query = "SELECT * FROM tb_rak WHERE id = '$id'";
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>views/rak" class="active">Data Rak</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Edit</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Rak <?=$data['nama']?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form name="formedit" id="formedit" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Nama Rak</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_nama" id="_nama" type="text" value="<?=$data['nama']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Lokasi Rak</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_lokasi" id="_lokasi" type="text" value="<?=$data['lokasi']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 float-right">
                                                <div class="float-right">
                                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" id="btn_reset" onClick="window.location.reload();" class="btn btn-secondary">
                                                        <i class="fa fa-refresh"></i> Reset
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
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