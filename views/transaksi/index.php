<?php 
    $title = 'Transaksi Saya';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();
    data_akun();
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
                                <li class="breadcrumb-item"><a href="#" class="active">Transaksi Saya</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Transaksi Saya</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tabel_buku" class="table table-hover">
                                        <thead class="text-white text-center bg-primary">
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                      
                                        <?php
                                            $idanggota = $profile_anggota['id'];
                                            $query = "SELECT tb_peminjaman.*, tb_buku.* FROM tb_peminjaman INNER JOIN tb_buku ON tb_peminjaman.id_buku=tb_buku.id WHERE tb_peminjaman.id_anggota ='$idanggota' ORDER BY tb_peminjaman.id DESC";
                                            $result = execute_query($con, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td class="text-center"><b><?= $no."." ?></b></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= date("l, d-F-Y", strtotime($data['tanggal_pinjam']) ) ?></td>
                                            <td><?= date("l, d-F-Y", strtotime($data['tanggal_kembali']) ) ?></td>
                                            <!-- //TAMPILKAN STATUS PEMINJAMAN -->
                                            <?php 
                                                $conn = connect_db();
                                                $queri = "SELECT * FROM tb_pengembalian WHERE id_anggota='$idanggota'";
                                                $results = execute_query($conn, $queri);
                                                $data_pinjam = mysqli_fetch_assoc($results);
                                            ?>
                                            <td class="text-center">
                                                <?php if($data_pinjam['id_anggota']==0) : ?>
                                                    <h5>
                                                        <span class="text-white badge badge-danger">Belum Dikembalikan</span>
                                                    </h5>
                                                <?php elseif ($data['denda']>0) : ?>
                                                    <h5>
                                                        <span class="badge badge-warning">Telat Mengambalikan</span>
                                                    </h5>  
                                                <?php elseif ($data_pinjam['id_anggota']!=1) : ?>  
                                                    <h5>
                                                        <span class="badge badge-success">Dikembalikan</span>
                                                    </h5>
                                                <?php endif; ?>  
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
