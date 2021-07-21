<?php 
    $title = 'Data Rak';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();

    include '../../layouts/header.php';

    if(isset($_GET['rak'])){
        $id = $_GET['rak'];
        $query = "SELECT * FROM tb_rak WHERE id='$id'";
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
                                <li class="breadcrumb-item"><a href="#" class="active">Detail</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Rak <?=$data['id']?> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <form>
                                        <div class="form-group">
                                            <label>Nama Rak</label>  
                                            <input type="text" class="form-control" value="<?= $data['nama']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lokasi Rak</label>  
                                            <input type="text" class="form-control" value="<?= $data['lokasi']?>" readonly>
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