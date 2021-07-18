<?php

function tambah(){
    $con = connect_db();
    if (isset($_POST['simpan'])){
        //deklarasi variabel yang disubmit dari form
        $nama = $_POST['_nama'];
        $lokasi = $_POST['_lokasi'];

        if(empty($nama)){
            echo "Nama rak harus diisi";
        } elseif(empty($lokasi)){
            echo "Lokasi rak harus diisi";
        } else {
            $query = "SELECT * from tb_rak WHERE lokasi='$lokasi'";
            $result = execute_query($con, $query);
            if(mysqli_num_rows($result) !=0){
                echo "Rak $lokasi dengan nama $nama sudah ada";
            } else {
                $queri = "INSERT INTO tb_rak (nama, lokasi) VALUES ('$nama','$lokasi')";
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
}
?>