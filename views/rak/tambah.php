<?php 
    $title = 'Tambah Data Rak';
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>" class="active">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Buku dan Rak</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/rak" class="active">Data Rak</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Buku</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Rak </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?= tambah()?>
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Nama Rak</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_nama" id="_nama" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Lokasi Rak</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_lokasi" id="_lokasi" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 float-right">
                                                <div class="float-right">
                                                    <button type="button" id="btn_reset" onClick="window.location.reload();" class="btn btn-danger">
                                                        <i class="fa fa-refresh"></i> Reset
                                                    </button>
                                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                                        <i class="mdi mdi-content-save"></i> Simpan
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

<?php include '../../layouts/footer.php';?>