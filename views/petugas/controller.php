<?php 
function tambah(){
    $con = connect_db();
    if(isset($_POST['simpan'])){
        $nama = $_POST['_nama'];
        $jabatan = $_POST['_jabatan'];
        $notelp = $_POST['_notelp'];
        $alamat = $_POST['_alamat'];

        $query = "SELECT * from tb_petugas WHERE nama='$nama' AND jabatan='$jabatan' AND no_telp='$notelp' AND alamat='$alamat'";
        $result = execute_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            echo "
                <script>
                    window.location.href='index.php';
                    alert('Data Sudah Ada di Database');
                </script>";
        } else {
            $queri = "INSERT INTO `tb_petugas` (`nama`, `jabatan`, `no_telp`, `alamat`) VALUES ('$nama', '$jabatan', '$notelp', '$alamat')";
            $result = execute_query($con, $queri);
            if (mysqli_affected_rows($con) >0){
                $_SESSION["suksestambah"] = "Berhasil Menambah Data";
                echo "
                    <script>
                        window.location.href='index.php';
                    </script>
                ";
            }
        }
    }
}
?>