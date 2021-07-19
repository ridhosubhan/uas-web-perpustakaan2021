<?php 
    $title = 'Tambah Data Buku';
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/buku" class="active">Data Buku</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Buku</a></li>
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
                            <?= tambah()?>
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-center">
                                            <img id="preview_gambar" src="" class="img-thumbnail img-fluid rounded m-b-10" alt="...">
                                            <div class="custom-file col-sm-12">
                                                <input type="file" name="_gambar" id="_gambar" class="custom-file-input" required>
                                                <label class="custom-file-label">Upload Foto Sampul</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Kode Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_kodebuku" id="_kodebuku" type="text" value="<?=kodebuku()?>" id="example-text-input" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Judul Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_judulbuku" id="_judulbuku" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Penulis Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_penulis" id="_penulis" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Penerbit Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_penerbit" id="_penerbit" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Tahun Terbit Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control hanyaAngka" name="_tahunterbit" id="_tahunterbit" maxlength="4" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Stok Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control hanyaAngka" name="_stok" id="_stok" maxlength="9" type="text" value="" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Rak Buku</label>
                                            <div class="col-sm-9">
                                                <select class="form-control _rakbuku" style="width: 100%" name="_rakbuku" required>
                                                    <option value="" disabled selected></option>
                                                    <?php
                                                        $query = "SELECT * FROM tb_rak";
                                                        $result = execute_query($con, $query);
                                                        while($rakid = mysqli_fetch_array($result)){
                                                    ?>
                                                        <option value="<?= $rakid['id']?>"> <?=$rakid['nama']."&nbsp;&nbsp;".$rakid['lokasi']?></option>   
                                                    <?php
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 float-right">
                                                <div class="float-right">
                                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                                        <i class="mdi mdi-content-save"></i> Simpan
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

<?php include '../../layouts/footer.php';?>
<script>
    //UNTUK EVENT HANYA KETIK ANGKA
    $('.hanyaAngka').on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    //Preview Gambar
    function readURL(input) {
            //Get Data Gambar
            const file = input.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

            if (input.files && file && validImageTypes.includes(fileType)) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_gambar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }else{
                alert("File harus gambar dengan format JPEG, JPG, atau PNG.");
                $('.custom-file-label').html('Pilih file gambar');
                $('#preview_gambar').attr('src', "https://ride4lessltd.com//assets/images/no_image.png");
            }
        }

        $('input[type="file"]').change(function(e){
            //Preview Nama File
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
            readURL(this);
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