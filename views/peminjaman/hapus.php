<?php 
    $title = 'Data Peminjaman';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();
            
    if(isset($_GET['peminjaman'])){
        $idpeminjam = $_GET['peminjaman'];
        $qry = "SELECT * FROM tb_peminjaman WHERE id='$idpeminjam'";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)>0){
            $query = "DELETE FROM tb_peminjaman WHERE id='$idpeminjam'";
            execute_query($con, $query);
            if(mysqli_affected_rows($con)>0){
                $_SESSION["sukseshapus"] = "Berhasil Menghapus Data Petugas";
                header ("location: index.php");
            }else{
                echo "Data Gagal Dihapus";
            }
        }else{
            echo "Gagal menghapus, data tidak ditemukan";
        }
    }
?>