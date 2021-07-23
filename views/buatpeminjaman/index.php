<?php 
    $title = 'Buat Peminjaman';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
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
                                <li class="breadcrumb-item"><a href="#" class="active">Buat Peminjaman</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Peminjaman Buku</h4>
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
                                    <div class='alert alert-info alert-dismissible fade show' role='alert'>
                                        <strong>".$_SESSION['suksestambah']."</strong> <br>".$_SESSION["suksesmohon"]."
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    ";
                                    unset($_SESSION['suksestambah']);
                                    unset($_SESSION['suksesmohon']);
                                }
                            ?>

                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tabel_buku" class="display table table-hover">
                                        <thead class="text-white text-center bg-primary">
                                        <tr>
                                            <th>No.</th>
                                            <th>Cover</th>
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
                                            $query = "SELECT * FROM tb_buku WHERE stok>0 ORDER BY id DESC";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><b><?= $no."." ?></b></td>
                                            <td><img class="img-thumbnail img-fluid rounded" width="180px" src="<?=BASEPATH?>/images/<?=$data['sampul']?>"></td>
                                            <td>
                                                <a href="detail.php?peminjaman=<?= $data['id'] ?>"> <?= $data['judul'] ?></a>
                                            </td>
                                            <td><?= $data['penulis'] ?></td>
                                            <td><?= $data['penerbit'] ?></td>
                                            <td><?= $data['tahun_terbit'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                            <td class="text-center">
                                                <a href="pinjam.php?peminjaman=<?= $data['id'] ?>" onclick="return confirm('Peminjaman Buku Hanya Bisa Selama 1 Minggu')" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" title="Pinjam buku <?= $data['judul'] ?>">
                                                    <i class="fa fa-plus-square"></i></a>    
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
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });
    });
</script>
