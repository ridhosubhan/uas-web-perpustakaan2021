<?php

include '../../konfigurasi/config.php';
include '../../konfigurasi/function.php'; 
$con = connect_db();

if (isset($_POST['_id_peminjam'])) {
    $id= $_POST['_id_peminjam'];
    $query = "SELECT tb_anggota.nama, tb_peminjaman.*  FROM tb_peminjaman INNER JOIN tb_anggota ON tb_peminjaman.id_anggota=tb_anggota.id WHERE tb_peminjaman.id='$id'";
    $result = execute_query($con, $query);
    $data = mysqli_fetch_object($result);

    echo json_encode(array('success' => $data));
} 

?>