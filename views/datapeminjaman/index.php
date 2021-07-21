<?php 
    $title = 'Data Peminjaman';
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
                                <li class="breadcrumb-item"><a href="#" class="active">Data Peminjam Buku</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Peminjam Buku</h4>
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
                                    <table id="tabel_buku" class="table table-hover">
                                        <thead class="text-white text-center bg-primary">
                                        <tr>
                                            <th>No.</th>
                                            <th>Cover</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>Stok</th>
                                            <th>Peminjam</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                      
                                        <?php
                                            $query = "SELECT tb_peminjaman.id as kode,tb_buku.id as kodebuku, tb_peminjaman.*, tb_buku.*, tb_anggota.* FROM tb_peminjaman INNER JOIN tb_buku ON tb_peminjaman.id_buku=tb_buku.id INNER JOIN tb_anggota ON tb_peminjaman.id_anggota=tb_anggota.id WHERE tb_peminjaman.id_petugas=0 ORDER BY tb_peminjaman.id DESC";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><b><?= $no."." ?></b></td>
                                            <td><img class="img-thumbnail img-fluid rounded" width="180px" src="<?=BASEPATH?>/images/<?=$data['sampul']?>"></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= $data['penulis'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td>
                                                <?php if($data['id_petugas']==0) : ?>
                                                    <h5>
                                                        <span class="text-white badge badge-warning">Waiting Approval</span>
                                                    </h5>
                                                <?php elseif ($data['id_petugas']==1) : ?>  
                                                        <h5>
                                                            <span class="badge badge-success">Approved</span>
                                                        </h5>
                                                <?php endif; ?>  
                                            </td>
                                            <td>
                                                <a href="proses.php?id=<?= $data['kode'] ?>&buku=<?= $data['kodebuku'] ?>" onclick="return confirm('Approve Peminjaman Buku?')" class="btn btn-info waves-effect waves-light">
                                                    <i class="fa fa-check-square"></i> Proses</a>
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
