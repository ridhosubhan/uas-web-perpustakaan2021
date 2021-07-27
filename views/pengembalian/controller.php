<?php

function tambah(){
    $con = connect_db();
    if(isset($_POST['simpan'])){
        $id_peminjam = $_POST['_id_peminjam'];

        $tgl_pengembalian = $_POST['_tanggal_pengembalian'];
        $denda = $_POST['_denda'];
        $id_buku = $_POST['_idBuku'];
        $id_anggota = $_POST['_id_anggota'];
        $id_petugas = $_POST['_idPetugas'];

        $query = "SELECT * from tb_peminjaman WHERE id='$id_peminjam'";
        $result = execute_query($con, $query);
        //DELETE table peminjaman
        if(mysqli_num_rows($result) > 0){
            // UPDATE STATUS PINJAM
            $queris = "UPDATE tb_peminjaman SET status_kembali='1' WHERE id='$id_peminjam'";
            $results = execute_query($con, $queris);

            //UPDATE STOK table buku
            $kueri = "UPDATE tb_buku SET stok = stok+1 WHERE id='$id_buku'";
            $hasil = execute_query($con, $kueri);
            //INSERT tb pengembalian
            $queri = "INSERT INTO `tb_pengembalian` (`tanggal_pengembalian`, `denda`, `id_buku`, `id_anggota`, `id_petugas`) VALUES ('$tgl_pengembalian', '$denda', '$id_buku', '$id_anggota', '$id_petugas')";
            $result = execute_query($con, $queri);
            if (mysqli_affected_rows($con) >0){
                $_SESSION["suksestambah"] = "Berhasil Memproses Data Pengembalian";
                echo "
                    <script>
                        window.location.href='index.php';
                    </script>
                ";
            }
            // if(mysqli_affected_rows($con) > 0){
            // }       
        } 
    }
}

?>