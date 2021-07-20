<?php 
    $title = 'Data Petugas';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();
            
    if(isset($_GET['petugas'])){
        $idpetuegas = $_GET['petugas'];
        $qry = "SELECT * FROM tb_petugas WHERE id='$idpetuegas'";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)>0){
            $query = "DELETE FROM tb_petugas WHERE id='$idpetuegas'";
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