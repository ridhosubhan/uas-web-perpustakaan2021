<?php 
    $title = 'Data Akun';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    include 'controller.php'; 
    cek_session();
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
                                <li class="breadcrumb-item"><a href="#" class="active">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="<?=BASEPATH?>/views/akun">Data Akun</a></li>
                                <li class="breadcrumb-item"><a href="#" class="active">Tambah Data Akun</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Akun </h4>
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
                                    <label>Pilih Sumber Data</label> 
                                        <select class="form-control select2" name="_filter" id="_filter" required>
                                            <option value="" disabled selected>Pilih Sumber Data</option>
                                            <option value="1"> Data Petugas </option>   
                                            <option value="2"> Data Anggota</option>  
                                        </select>
                                </div>
                                <div class="form-group _dataAnggota">
                                    <label>Data Anggota</label> 
                                        <select class="form-control select2" name="_anggota" id="_anggota">
                                            <option value="" disabled selected>Pilih Nama Anggota</option>
                                            <?php
                                                $query = "SELECT * FROM tb_anggota WHERE status_akun=0";
                                                $result = execute_query($con, $query);
                                                while($idanggota = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?= $idanggota['id']?>"> <?=$idanggota['kode_anggota']."&nbsp; &nbsp;".$idanggota['nama']?></option>   
                                            <?php
                                                } 
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group _dataPetugas">
                                    <label>Data Petugas</label> 
                                        <select class="form-control select2" name="_petugas" id="_petugas">
                                            <option value="" disabled selected>Pilih Nama Petugas</option>
                                            <?php
                                                $query = "SELECT * FROM tb_petugas WHERE status_akun=0";
                                                $result = execute_query($con, $query);
                                                while($idanggota = mysqli_fetch_array($result)){
                                            ?>
                                                <option value="<?= $idanggota['id']?>"> <?=$idanggota['nama']?></option>   
                                            <?php
                                                } 
                                            ?> 
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label> 
                                    <input name="_username" id="_username" type="text" class="form-control" placeholder="Ketik Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label> 
                                    <input name="_password" id="_password" type="password" class="form-control" placeholder="Ketik Password" required>
                                </div>
                                <div class="form-group _rolePetugas">
                                    <label>Role</label> 
                                        <select class="form-control select2" name="_role" id="_role">
                                            <option value="" disabled selected>Pilih Role</option>
                                            <option value="Admin"> Admin</option>   
                                            <option value="Petugas"> Staff</option>
                                        </select>
                                </div>
                                <div class="form-group _roleAnggota">
                                    <label>Role</label> 
                                        <select class="form-control select2" name="_role" id="_role">
                                            <option value="" disabled selected>Pilih Role</option>
                                            <option value="Anggota"> Anggota</option>
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