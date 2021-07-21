<?php 
    $title = 'Data Peminjaman';
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>">Menu Utama</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Data Transaksi</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/peminjaman">Data Peminjaman</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Peminjaman</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Peminjaman </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?= tambah();?>
                            <form name="formtambah" id="formtambah" method="post" class="form-group" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tanggal Peminjaman</label> 
                                    <input name="_tanggal_pinjam" id="_tanggal_pinjam" type="date" class="form-control" placeholder="Pilih Tanggal Peminjaman" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pengembalian</label> 
                                    <input name="_tanggal_kembali" id="_tanggal_kembali" type="date" class="form-control" placeholder="Pilih Tanggal Pengembalian" required>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label> 
                                        <select class="form-control select2" name="_id_buku" id="_id_buku">
                                            <option value="" disabled selected>Pilih Judul Buku</option>
                                            <?php
                                            $query = "SELECT * FROM tb_buku";
                                            $result = execute_query($con, $query);
                                            while($id_buku = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?= $id_buku['id'] ?>"><?= $id_buku['judul'] ?></option> 
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label> 
                                        <select class="form-control select2" name="_id_anggota" id="_id_anggota">
                                            <option value="" disabled selected>Pilih Nama Anggota</option>
                                            <?php
                                            $query = "SELECT * FROM tb_anggota";
                                            $result = execute_query($con, $query);
                                            while($id_anggota = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?= $id_anggota['id'] ?>"><?= $id_anggota['nama'] ?></option> 
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Petugas</label> 
                                        <select class="form-control select2" name="_id_petugas" id="_id_petugas">
                                            <option value="" disabled selected>Pilih Nama Anggota</option>
                                            <?php
                                            $query = "SELECT * FROM tb_petugas";
                                            $result = execute_query($con, $query);
                                            while($id_petugas = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?= $id_petugas['id'] ?>"><?= $id_petugas['nama'] ?></option> 
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" id="submit" name="simpan" value="simpan" class="btn btn-primary">
                                        <i class="mdi mdi-content-save"></i> Simpan
                                    </button>
                                    <button type="button" id="btn_reset" onClick="window.location.reload();" class="btn btn-secondary">
                                        <i class="fa fa-refresh"></i> Reset
                                    </button>
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
    $(document).ready(function(){
        $('._dataAnggota').hide();
        $('._dataPetugas').hide();
        $('._rolePetugas').hide();
        $('._roleAnggota').hide();
    });

    $('#_filter').on('change', function () {
        if(this.value==1){
            $('._dataAnggota').hide();
            $('._roleAnggota').hide();
            $('._dataPetugas').show(); 
            $('._rolePetugas').show();
        }
        else if(this.value==2){
            $('._dataPetugas').hide(); 
            $('._rolePetugas').hide();
            $('._dataAnggota').show();
            $('._roleAnggota').show();
        }
    });
</script>