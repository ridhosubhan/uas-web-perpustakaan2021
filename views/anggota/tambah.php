<?php 
    $title = 'Tambah Data Anggota';
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/buku" class="active">Data Anggota</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Anggota</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Buku </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?=tambah()?>
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Kode Anggota</label> 
                                    <input name="_kodeanggota" id="_kodeanggota" type="text" value="<?=kodeanggota();?>" class="form-control" placeholder="Kode Anggota" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label> 
                                    <input name="_nama" id="_nama" type="text" class="form-control" placeholder="Ketik Nama Anggota" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label> 
                                        <select class="form-control" name="_jenkel" id="_jenkel" required>
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L"> Laki - Laki</option>   
                                            <option value="P"> Perempuan</option>   
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label> 
                                    <input name="_notelp" id="_notelp" type="text" class="form-control" placeholder="Ketik Nomor Telepon" required>
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
<script>
    //UNTUK EVENT HANYA KETIK ANGKA
    $('.hanyaAngka').on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $(document).ready(function() {
        //Set gambar default
        $('#preview_gambar').attr('src', "https://ride4lessltd.com//assets/images/no_image.png");

        // SELECT2
        $('._rakbuku').select2();
        $(window).resize(function() {
                $('.select2').css('width', "100%");
            });
    }); 
    
</script>