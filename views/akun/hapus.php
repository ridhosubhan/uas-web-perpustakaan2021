<?php 
    $title = 'Data Akun';
    include '../../konfigurasi/config.php';
    include '../../konfigurasi/function.php'; 
    session_start();
    $con = connect_db();
            
    if(isset($_GET['user'])){
        $id_user = $_GET['user'];
        $qry = "SELECT * FROM tb_user WHERE id='$id_user'";
        $result = execute_query($con, $qry);
        $data = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)>0){
            if($data['role']=='Anggota'){
                $qry = "SELECT tb_anggota.* FROM tb_user JOIN tb_anggota on tb_user.relasi=tb_anggota.id WHERE tb_user.id ='$id_user'";
                $result = execute_query($con, $qry);
                $data_anggota = mysqli_fetch_assoc($result);

                $id_anggota = $data_anggota['id'];
                $kueri = "UPDATE tb_anggota SET status_akun=0 WHERE id = '$id_anggota'";
                $update_anggota = execute_query($con, $kueri);

                $query = "DELETE FROM tb_user WHERE id='$id_user'";
                execute_query($con, $query);
                if(mysqli_affected_rows($con)>0){
                    $_SESSION["sukseshapus"] = "Berhasil Menghapus Data Akun Anggota";
                    header ("location: index.php");
                }else{
                    echo "Data Gagal Dihapus";
                }
            }else{
                $qry = "SELECT tb_petugas.* FROM tb_user JOIN tb_petugas on tb_user.relasi=tb_petugas.id WHERE tb_user.id ='$id_user'";
                $result = execute_query($con, $qry);
                $data_petugas = mysqli_fetch_assoc($result);

                $id_petugas = $data_petugas['id'];
                $kueri = "UPDATE tb_petugas SET status_akun=0 WHERE id = '$id_petugas'";
                $update_petugas = execute_query($con, $kueri);

                $query = "DELETE FROM tb_user WHERE id='$id_user'";
                execute_query($con, $query);
                if(mysqli_affected_rows($con)>0){
                    $_SESSION["sukseshapus"] = "Berhasil Menghapus Data Akun Petugas";
                    header ("location: index.php");
                }else{
                    echo "Data Gagal Dihapus";
                }
            }
        }else{
            echo "Gagal menghapus, data tidak ditemukan";
        }
    }
?>