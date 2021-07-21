<?php 
    $title = 'Data Rak';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();
    
    if(isset($_GET['rak'])){
        $id = $_GET['rak'];
        $query = "DELETE FROM tb_rak WHERE id='$id'";
        execute_query($con, $query);
        if (mysqli_affected_rows($con)>0){
            $_SESSION["sukseshapus"] = "Berhasil Menghapus Data Rak";
            header ("location: index.php");
        }else{
            echo "Data Gagal Dihapus";
        }
    }
?>