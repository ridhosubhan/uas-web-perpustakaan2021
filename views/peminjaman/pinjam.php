<?php 
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();
            
    if(isset($_GET['peminjaman'])){
        $kodebuku = $_GET['peminjaman'];
        $qry = "SELECT * FROM tb_buku WHERE kode_buku='$kodebuku'";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        if($data['stok']<0){
            echo "
                <script>
                    window.location.href='index.php';
                    alert('Stok Buku Kosong. Tidak bisa meminjam');
                </script>";
        }else{
            data_akun();
            $tanggal_pinjam = date('Y-m-d', time());
            $tanggal_kembali = date('Y-m-d', strtotime("+7 day", time()));
            $idanggota = $profile_anggota['id'];
            $queri = "INSERT INTO `tb_peminjaman` (`tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`) VALUES ('$tanggal_pinjam', '$tanggal_kembali', '$kodebuku','$idanggota')";
            $result = execute_query($con, $queri);
            if (mysqli_affected_rows($con) !=0){
                $_SESSION["suksestambah"] = "Berhasil Memproses Data";
                $_SESSION["suksesmohon"] = "Mohon Tunggu Sampai Peminjaman Disetujui Petugas";
                echo "
                    <script>
                        window.location.href='index.php';
                    </script>
                ";
            }
        }
    }
?>