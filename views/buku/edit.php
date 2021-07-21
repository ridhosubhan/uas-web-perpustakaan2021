<?php 
    $title = 'Data Buku';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    cek_session();
    $con = connect_db();

    include '../../layouts/header.php';

    //EDIT
    if(isset($_POST['simpan'])){
        $kodebuku = $_GET['buku'];
        $judul_buku = $_POST['_judulbuku'];
        $penulis_buku = $_POST['_penulis'];
        $penerbit_buku = $_POST['_penerbit'];
        $tahunterbit_buku = $_POST['_tahunterbit'];
        $stok_buku = $_POST['_stok'];
        $rak_id = $_POST['_rakbuku'];

        if(empty($kodebuku)){
            echo "
                <script>
                    alert('Gamau Ah Gaada Kode Bukunya');
                </script>";
        } else{
            $kodebuku = $_GET['buku'];
            $qry = "SELECT * FROM tb_buku WHERE kode_buku='$kodebuku'";
            $result = execute_query($con, $qry);
            $data = mysqli_fetch_assoc($result);

            if($data['sampul']==$_POST['label-gambar']){
                // update tanpa gambar
                $query = "UPDATE tb_buku SET judul='$judul_buku', penulis='$penulis_buku', penerbit='$penerbit_buku', tahun_terbit='$tahunterbit_buku', stok='$stok_buku', id_rak='$rak_id' WHERE kode_buku='$kodebuku'";
                $result = execute_query($con,$query);
                if(mysqli_affected_rows ($con) >0 ){
                    $_SESSION["suksesedit"] = "Berhasil Mengubah Data Buku Dengan Kode : ".$kodebuku;
                    echo "
                        <script>
                            window.location.href='index.php';
                        </script>
                    ";
                }else{
                    echo mysqli_error($con);
                }
            }else{
                // update dengan gambar
                if(isset($_FILES['_gambar'])){
                    $pathgambar = "../../images/".$data['sampul'];
                    unlink($pathgambar); //Hapus gambar dari folder

                    $errors = array();
                    $file_name = trim($_FILES['_gambar']['name']);
                    $file_size = $_FILES['_gambar']['size'];
                    $file_tmp = $_FILES['_gambar']['tmp_name'];
                    $file_type = $_FILES['_gambar']['type'];
                    $tmp = explode('.', $file_name);
                    $file_ext = strtolower(end($tmp));
                    $extensions = array("jpeg","jpg","png");

                    if(in_array($file_ext, $extensions) == FALSE){
                        echo "
                            <script>
                                alert('File harus gambar dengan format JPEG, JPG, atau PNG');
                            </script>";
                    }else if(($file_size > 2097152) || ($file_size == 0)){
                        echo "
                            <script>
                                alert('Maksimal ukuran file 2MB');
                            </script>";
                    }else{
                        if(move_uploaded_file($file_tmp, "../../images/".$file_name)){
                            $query = "UPDATE tb_buku SET sampul='$file_name', judul='$judul_buku', penulis='$penulis_buku', penerbit='$penerbit_buku', tahun_terbit='$tahunterbit_buku', stok='$stok_buku', id_rak='$rak_id' WHERE kode_buku='$kodebuku'";
                            $result = execute_query($con,$query);
                            if(mysqli_affected_rows ($con) >0 ){
                                $_SESSION["suksesedit"] = "Berhasil Mengubah Data Buku Dan Sampulnya Dengan Kode : ".$kodebuku;
                                echo "
                                    <script>
                                        window.location.href='index.php';
                                    </script>
                                ";
                            }else{
                                echo mysqli_error($con);
                            }
                        }else{
                            echo "
                                <script>
                                    alert('Tidak Dapat Upload Foto');
                                </script>";
                        }
                    }
                }
            }    
        }
    }else if(isset($_GET['buku'])){
        $kodebuku = $_GET['buku'];
        $query = "SELECT * FROM tb_buku WHERE kode_buku='$kodebuku'";
        $result = execute_query($con,$query);
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>views/buku" class="active">Data Buku</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Edit</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Buku <?=$data['judul']?> </h4>
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
                                    <div class="col-sm-4">
                                        <div class="text-center">
                                            <input type="hidden" size="100" name="label-gambar" id="label-gambar" value="<?= $data['sampul'] ?>">
                                            <img id="preview_gambar" src="<?=BASEPATH?>images/<?=$data['sampul']?>" class="img-thumbnail img-fluid rounded m-b-10" alt="...">
                                            <div class="custom-file col-sm-12">
                                                <input type="file" name="_gambar" id="_gambar" class="custom-file-input">
                                                <label class="custom-file-label"><?=$data['sampul']?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Kode Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_kodebuku" id="_kodebuku" type="text" value="<?=$data['kode_buku']?>" id="example-text-input" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Judul Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_judulbuku" id="_judulbuku" type="text" value="<?=$data['judul']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Penulis Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_penulis" id="_penulis" type="text" value="<?=$data['penulis']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Penerbit Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="_penerbit" id="_penerbit" type="text" value="<?=$data['penerbit']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Tahun Terbit Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control hanyaAngka" name="_tahunterbit" id="_tahunterbit" maxlength="4" type="text" value="<?=$data['tahun_terbit']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Stok Buku</label>
                                            <div class="col-sm-9">
                                                <input class="form-control hanyaAngka" name="_stok" id="_stok" maxlength="9" type="text" value="<?=$data['stok']?>" id="example-text-input" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Rak Buku</label>
                                            <div class="col-sm-9">
                                                <select class="form-control select2" style="width: 100%" name="_rakbuku" required>
                                                    <option value="" disabled selected></option>
                                                    <?php
                                                        $query = "SELECT * FROM tb_rak";
                                                        $result = execute_query($con, $query);
                                                        while($rakid = mysqli_fetch_array($result)){
                                                    ?>
                                                        <option value="<?= $rakid['id']?>"
                                                            <?php
                                                                if($rakid['id'] == $data['id_rak']){
                                                                    echo "selected";
                                                                }
                                                            ?>
                                                        > <?=$rakid['nama']."&nbsp;&nbsp;".$rakid['lokasi']?></option>   
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

<script>
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
            $('#label-gambar').val(fileName);
            readURL(this);
        });
</script>