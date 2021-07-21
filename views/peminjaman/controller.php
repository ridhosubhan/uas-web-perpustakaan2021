<?php

function tambah(){
    $con = connect_db();
    if(isset($_POST['simpan'])){
        $tgl_pinjam = $_POST['_tanggal_pinjam'];
        $tgl_kembali = $_POST['_tanggal_kembali'];
        $id_buku = $_POST['_id_buku'];
        $id_anggota = $_POST['_id_anggota'];
        $id_petugas = $_POST['_id_petugas'];

        $query = "SELECT * from tb_peminjaman WHERE id_buku='$id_buku'";
        $result = execute_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            echo "
                <script>
                    window.location.href='index.php';
                    alert('Buku Sudah Dipinjam');
                </script>";
        } else {
            $queri = "INSERT INTO `tb_peminjaman` (`tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES ('$tgl_pinjam', '$tgl_kembali', '$id_buku', '$id_anggota', '$id_petugas')";
            $result = execute_query($con, $queri);
            if (mysqli_affected_rows($con) !=0){
                $_SESSION["suksestambah"] = "Berhasil Menambah Data";
                echo "
                    <script>
                        window.location.href='index.php';
                    </script>
                ";;
            }
        }
    }
}

?>