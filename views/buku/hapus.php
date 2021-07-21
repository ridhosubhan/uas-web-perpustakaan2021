<?php 
    $title = 'Data Buku';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    cek_session();
    $con = connect_db();
            
    if(isset($_GET['buku'])){
        $kodebuku = $_GET['buku'];
        $qry = "SELECT * FROM tb_buku WHERE kode_buku='$kodebuku'";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        $pathgambar = "../../images/".$data['sampul'];
        if(mysqli_num_rows($result)>0){
            unlink($pathgambar); //Hapus gambar dari folder
            $query = "DELETE FROM tb_buku WHERE kode_buku='$kodebuku'";
            execute_query($con, $query);
            if(mysqli_affected_rows($con)>0){
                $_SESSION["sukseshapus"] = "Berhasil Menghapus Data Buku";
                header ("location: index.php");
            }else{
                echo "Data Gagal Dihapus";
            }
        }else{
            echo "Gagal menghapus, data tidak ditemukan";
        }
    }
?>