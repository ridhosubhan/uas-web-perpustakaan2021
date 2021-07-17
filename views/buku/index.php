<?php 
    $title = 'Data Buku';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> <?=$title?> - Sistem Informasi Perpustakaan</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?= BASEPATH?>/assets/images/favicon.ico">

        <link href="<?= BASEPATH?>/assets/plugins/morris/morris.css" rel="stylesheet">

        <link href="<?= BASEPATH?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= BASEPATH?>/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= BASEPATH?>/assets/css/style.css" rel="stylesheet" type="text/css">

    </head>
    
    <?php 
        include '../../layouts/header.php';
    ?>

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#" class="active">Buku & Rak</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Data Buku</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Buku</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <!-- Alert buat notifikasi berhasil hapus -->
                            <?php
                                if (isset($_SESSION["suksestambah"])){
                                    echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>".$_SESSION['suksestambah']."</strong>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    ";
                                    unset($_SESSION['suksestambah']);
                                }else if (isset($_SESSION["suksesedit"])){
                                    echo "
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>".$_SESSION['suksesedit']."</strong>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    ";
                                    unset($_SESSION['suksesedit']);
                                }else if (isset($_SESSION["sukseshapus"])){
                                    echo "
                                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>".$_SESSION['sukseshapus']."</strong>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    ";
                                    unset($_SESSION['sukseshapus']);
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="tambah.php" class="float-left btn btn-primary m-b-30 waves-effect waves-light">
                                        <span><i class="fa fa-user-plus"></i>  Tambah Data</span>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group float-right m-b-30">
                                        <span class="input-group-prepend">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button> </span>
                                        <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Cari Data">
                                    </div>
                                </div>
                            </div>

                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table  table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                      
                                        <?php 
                                            $con = connect_db();
                                            $query = "SELECT * FROM tb_buku";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td><?= $no."." ?></td>
                                            <td><?= $data['kode_buku'] ?></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= $data['penulis'] ?></td>
                                            <td><?= $data['penerbit'] ?></td>
                                            <td><?= $data['tahun_terbit'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                            <td>
                                                <a href="detail.php?buku=<?= $data['kode_buku'] ?>" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Lihat data <?= $data['kode_buku'] ?>">
                                                    <i class="mdi mdi-account-card-details"></i></a>
                                                <a href="edit.php?buku=<?= $data['kode_buku'] ?>" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" title="Edit data <?= $data['kode_buku'] ?>">
                                                    <i class="mdi mdi-pencil-box"></i></a>
                                                <a href="hapus.php?buku=<?= $data['kode_buku'] ?>" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="Hapus data <?= $data['kode_buku'] ?>">
                                                    <i class="mdi mdi-delete-forever"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
                                                            
        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

<?php include '../../layouts/footer.php';?>