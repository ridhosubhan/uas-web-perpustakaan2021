<?php 
    $title = 'Data Pengembalian';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();
            
    if(isset($_GET['pengembalian'])){
        $idpengembali = $_GET['pengembalian'];
        $qry = "SELECT * FROM tb_pengembalian WHERE id='$idpengembali'";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)>0){
            $query = "DELETE FROM tb_pengembalian WHERE id='$idpengembali'";
            execute_query($con, $query);
            if(mysqli_affected_rows($con)>0){
                $_SESSION["sukseshapus"] = "Berhasil Menghapus Data Pengembalian";
                header ("location: index.php");
            }else{
                echo "Data Gagal Dihapus";
            }
        }else{
            echo "Gagal menghapus, data tidak ditemukan";
        }
    }
?>