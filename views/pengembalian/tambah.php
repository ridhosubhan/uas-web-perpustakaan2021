<?php 
    $title = 'Data Pengembalian';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    cek_session();
    data_akun();
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
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/pengembalian">Data Pengembalian</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Pengembalian</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Pengembalian </h4>
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul Buku</label> 
                                            <select class="form-control select2" name="_id_peminjam" id="_id_peminjam" required>
                                                <option value="" disabled selected>Pilih Judul Buku</option>
                                                <?php
                                                    $query = "SELECT tb_peminjaman.id as id_peminjaman, tb_peminjaman.*, tb_buku.* FROM tb_peminjaman INNER JOIN tb_buku ON tb_peminjaman.id_buku=tb_buku.id";
                                                    $result = execute_query($con, $query);
                                                    while($id_buku = mysqli_fetch_array($result)) {
                                                ?>
                                                     <option value="<?= $id_buku['id_peminjaman'] ?>"><?= $id_buku['judul'] ?></option> 
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Peminjam</label> 
                                            <input type="text" id="_idPetugas" name="_idPetugas" class="form-control"> <!-- ID BUKU -->
                                            <input type="text" id="_idBuku" name="_idBuku" class="form-control"> <!-- ID BUKU -->
                                            <input type="text" id="_namapeminjam" class="form-control"> <!-- NAMA PEMINJAM -->
                                            <input type="text" id="_id_anggota" name="_id_anggota" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tanggal Peminjaman</label> 
                                            <input readonly type="date" id="_tanggal_pinjam" class="form-control" placeholder="Pilih Tanggal Pengembalian" value="<?=$id_buku['tanggal_pinjam']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tanggal Pengembalian</label> 
                                            <input name="_tanggal_pengembalian" id="_tanggal_pengembalian" type="date" class="form-control" placeholder="Pilih Tanggal Pengembalian" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Denda (Rp.)</label> 
                                            <input name="_denda" id="_denda" value="0" class="form-control hanyaAngka" placeholder="Masukkan Jumlah Denda" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Nama Petugas</label> 
                                    <input type="text" class="form-control" value="<?=$profile_petugas['nama']?>" readonly required>
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
    $('#_id_peminjam').change(function() {
        var pinjam = $(this).children("option:selected").val();
        $.ajax({
            type: "POST",
            url: 'search_ajax.php',
            data: $(this).serialize(),
            success: function(response){
                var jsonData = JSON.parse(response);
                console.log(jsonData);
                $('#_idPetugas').val(jsonData.success.id_petugas);
                $('#_idBuku').val(jsonData.success.id_buku);
                $('#_id_anggota').val(jsonData.success.id_anggota);
                $('#_namapeminjam').val(jsonData.success.nama);
                $('#_tanggal_pinjam').val(jsonData.success.tanggal_pinjam);
            }
       });
    });

    const diffDays = (date, otherDate) => Math.ceil(Math.abs(date - otherDate) / (1000 * 60 * 60 * 24));
    $('#_tanggal_pengembalian').change(function() {
        var pinjam = $('#_tanggal_pinjam').val();
        var kembali = $(this).val();
        var hasil = diffDays(new Date(kembali), new Date(pinjam));
        
        if(hasil>7){
            alert('Pengambalian Telat');
        }   
    });
</script>