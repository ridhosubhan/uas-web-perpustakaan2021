<?php 
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();
            
    if(isset($_GET['id']) && isset($_GET['id'])){
        data_akun();
        $kodepeminjaman = $_GET['id'];
        $kodebuku = $_GET['buku'];
        $idpetugas = $profile_petugas['id'];

        //PILIH DATA CEK JIKA PEMINJAMAN SUDAH DIPROSES
        $qry = "SELECT * FROM tb_peminjaman";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        if($data['id_petugas']==0){
            $query = "UPDATE tb_peminjaman SET id_petugas='$idpetugas' WHERE id='$kodepeminjaman'";
            $result = execute_query($con, $query);
            $data = mysqli_fetch_assoc($result);
            if (mysqli_affected_rows($con) >0){
                $query = "UPDATE tb_buku SET stok=stok-1 WHERE id='$kodebuku'";
                $result = execute_query($con, $query);
                if (mysqli_affected_rows($con) >0){
                    $_SESSION["suksestambah"] = "Berhasil Memproses Data";
                    $_SESSION["suksesmohon"] = "Peminjaman Buku Disetujui";
                    echo "
                        <script>
                            window.location.href='index.php';
                        </script>
                    ";
                }
            }
        }else{
            echo "
                <script>
                    alert('Buku Sudah Diproses');
                    window.location.href='index.php';
                </script>
            ";
        }   
    }
?>