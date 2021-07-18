<?php 
    $title = 'Data Rak';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();
?>
    
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>" class="active">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Buku dan Rak</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Data Rak</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Rak</h4>
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
                            <div class="row m-b-20">
                                <div class="col-sm-12">
                                    <a href="tambah.php" class="float-left btn btn-primary m-b-10 waves-effect waves-light">
                                        <span><i class="fa fa-user-plus"></i>  Tambah Data</span>
                                    </a>
                                </div>
                            </div>
                            

                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tabel_buku" class="table table-hover" width="100%">
                                        <thead class="text-white text-center bg-primary">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                      
                                        <?php
                                            $query = "SELECT * FROM tb_rak ORDER BY id DESC";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td><b><?= $no."." ?></b></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['lokasi'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <a href="detail.php?buku=<?= $data['lokasi'] ?>" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Lihat data <?= $data['kode_buku'] ?>">
                                                            <i class="mdi mdi-account-card-details"></i></a>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <a href="edit.php?buku=<?= $data['lokasi'] ?>" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" title="Edit data <?= $data['kode_buku'] ?>">
                                                            <i class="mdi mdi-pencil-box"></i></a>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <a href="hapus.php?buku=<?= $data['lokasi'] ?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="Hapus data <?= $data['kode_buku'] ?>">
                                                            <i class="mdi mdi-delete-forever"></i></a>
                                                    </div>
                                                </div>
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

<!-- Required datatable js -->
<script src="<?=BASEPATH?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?=BASEPATH?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?=BASEPATH?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?=BASEPATH?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?=BASEPATH?>assets/pages/datatables.init.js"></script>

<script>
    $(document).ready(function(){
        $('#tabel_buku').DataTable({
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            // dom: 'Blfrtip',
            dom:"<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-5 text-center'B><'col-sm-12 col-md-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<?php include '../../layouts/footer.php';?>