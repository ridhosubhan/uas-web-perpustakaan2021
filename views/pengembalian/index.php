<?php 
    $title = 'Data Pengembalian';
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
                                <li class="breadcrumb-item"><a href="#" class="active">Data Transaksi</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Data Pengembalian</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Pengembalian</h4>
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
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Nama Peminjam</th>
                                            <th>Petugas</th>
                                            <th>Denda</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                      
                                        <?php
                                            $query = "SELECT tb_buku.*, tb_pengembalian.*, tb_petugas.nama as namapetugas, tb_anggota.nama as namaanggota FROM tb_pengembalian 
                                            INNER JOIN tb_buku ON tb_buku.id = tb_pengembalian.id_buku 
                                            INNER JOIN tb_petugas ON tb_pengembalian.id_petugas = tb_petugas.id 
                                            INNER JOIN tb_anggota ON tb_pengembalian.id_anggota = tb_anggota.id 
                                            ORDER BY tb_pengembalian.id DESC";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><b><?= $no."." ?></b></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= date("l, d-F-Y", strtotime($data['tanggal_pengembalian']) ) ?></td>
                                            
                                            <td><?= $data['namaanggota'] ?></td>
                                            <td><?= $data['namapetugas'] ?></td>
                                            <td>
                                                <?php if($data['denda']<=0):?>
                                                    <h5>
                                                        <span class="badge badge-success">Tidak Didenda</span>
                                                    </h5> 
                                                <?php elseif ($data['denda']>0) : ?>
                                                    <h5>
                                                        <span class="badge badge-danger">Denda Rp.<?=$data['denda']?></span>
                                                    </h5>   
                                                <?php endif; ?> 
                                            </td>
                                            <td>
                                                <h5>
                                                    <span class="badge badge-success">Dikembalikan</span>
                                                </h5> 
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