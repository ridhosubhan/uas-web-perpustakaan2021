<?php 
    $title = 'Data Akun';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    cek_session();
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
                                <li class="breadcrumb-item"><a href="#" class="active">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Data Akun</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Akun</h4>
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
                                    <table id="tabel_buku" class="table table-hover">
                                        <thead class="text-white text-center bg-primary">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                      
                                        <?php
                                            $query = "SELECT * FROM tb_user ORDER BY id DESC";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><b><?= $no."." ?></b></td>
                                            <td>
                                                <?php 
                                                    if($data['role']=='Anggota'){
                                                        $id = $data['id'];
                                                        $queri = "SELECT tb_anggota.nama as anggota FROM tb_user JOIN tb_anggota on tb_user.relasi=tb_anggota.id WHERE tb_user.id ='$id'";
                                                        $results = execute_query($con, $queri);
                                                        while ($anggota = mysqli_fetch_array($results)){
                                                            echo $anggota['anggota'];
                                                        }
                                                    }else{
                                                        $id = $data['id'];
                                                        $queri = "SELECT tb_petugas.nama as petugas FROM tb_user JOIN tb_petugas on tb_user.relasi=tb_petugas.id WHERE tb_user.id ='$id'";
                                                        $results = execute_query($con, $queri);
                                                        while ($petugas = mysqli_fetch_array($results)){
                                                            echo $petugas['petugas'];
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['role'] ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="detail.php?user=<?= $data['id'] ?>" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Lihat data <?= $data['username'] ?>">
                                                        <i class="mdi mdi-account-card-details"></i> Detail</a>
                                                    <a href="hapus.php?user=<?= $data['id'] ?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="Hapus data <?= $data['username'] ?>">
                                                        <i class="mdi mdi-delete-forever"></i> Hapus</a>
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

<?php include '../../layouts/footer.php';?>
<script>
    $(document).ready(function(){
        $('#tabel_buku').DataTable({
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            // dom: 'Blfrtip',
            dom:"<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-5 text-center'B><'col-sm-12 col-md-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'csv', 
                    className: 'btn-primary',
                    text: '<i class="mdi mdi-file-excel"></i> CSV',
                },
                { 
                    extend: 'excel', 
                    className: 'btn-primary',
                    text: '<i class="mdi mdi-file-excel"></i> Excel', },
                { 
                    extend: 'pdf', 
                    className: 'btn-primary',
                    text: '<i class="mdi mdi-file-pdf"></i> Pdf', },
                { 
                    extend: 'print', 
                    className: 'btn-primary',
                    text: '<i class="mdi mdi-printer"></i> Print', },
            ]
        });
    });
</script>
