<?php 
    $title = 'Data Petugas';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    session_start();
    $con = connect_db();

    include '../../layouts/header.php';
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
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Petugas</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Petugas </h4>
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
                                    <input name="_nama" id="_nama" type="text" class="form-control" placeholder="Ketik Nama Petugas" required>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label> 
                                        <select class="form-control select2" name="_jabatan" id="_jabatan" required>
                                            <option value="" disabled selected>Pilih Jabatan</option>
                                            <option value="Manager"> Manager </option>   
                                            <option value="Supervisor"> Supervisor</option>   
                                            <option value="Staff"> Staff</option>   
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label> 
                                    <input name="_notelp" id="_notelp" type="text" class="form-control hanyaAngka" placeholder="Ketik Nomor Telepon" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label> 
                                    <textarea name="_alamat" id="_alamat" class="form-control" rows="5" placeholder="Ketik Alamat Lengkap" required></textarea>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                        <i class="mdi mdi-content-save"></i> Simpan
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

<?php include '../../layouts/footer.php';?>