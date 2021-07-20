<?php

function kodeanggota(){
    // mengambil data barang dengan kode paling besar
    $con = connect_db();
    $query = "SELECT max(kode_anggota) as kodeTerbesar FROM tb_anggota";
    $result = execute_query($con, $query);

    $data = mysqli_fetch_array($result);

    $kodeAnggota = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeAnggota, 4, 4);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
    
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "ANG-";
    $kodeAnggota = $huruf . sprintf("%04s", $urutan);
    return $kodeAnggota;
}

function tambah(){
    $con = connect_db();
    if(isset($_POST['simpan'])){
        $kode_anggota = kodeanggota();
        $nama = $_POST['_nama'];
        $jenkel = $_POST['_jenkel'];
        $notelp = $_POST['_notelp'];
        $alamat = $_POST['_alamat'];

        $query = "SELECT * from tb_anggota WHERE nama='$nama' AND jenkel='$jenkel' AND no_telp='$notelp' AND alamat='$alamat'";
        $result = execute_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            echo "
                <script>
                    window.location.href='index.php';
                    alert('Data Sudah Ada di Database');
                </script>";
        } else {
            $queri = "INSERT INTO `tb_anggota` (`kode_anggota`, `nama`, `jenkel`, `no_telp`, `alamat`) VALUES ('$kode_anggota', '$nama', '$jenkel', '$notelp', '$alamat')";
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