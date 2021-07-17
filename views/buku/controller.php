<?php

function kodebuku(){
    // mengambil data barang dengan kode paling besar
    $con = connect_db();
    $query = "SELECT max(kode_buku) as kodeTerbesar FROM tb_buku";
    $result = execute_query($con, $query);

    $data = mysqli_fetch_array($result);

    $kodeBuku = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBuku, 4, 4);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
    
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "BKU-";
    $kodeBuku = $huruf . sprintf("%04s", $urutan);
    return $kodeBuku;
}

function tambah(){
    $con = connect_db();
    if(isset($_POST['simpan'])){
        // $kode_buku = $_POST['_kodebuku'];
        $kode_buku = kodebuku();
        $judul_buku = $_POST['_judulbuku'];
        $penulis_buku = $_POST['_penulis'];
        $penerbit_buku = $_POST['_penerbit'];
        $tahunterbit_buku = $_POST['_tahunterbit'];
        $stok_buku = $_POST['_stok'];
        $rak_id = $_POST['_rakbuku'];
        if(empty($stok_buku)){
            echo "Isi Kode Buku Dong Bos!!";
        } else{
            $query = "INSERT INTO `tb_buku` (`kode_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `id_rak`) VALUES ('$kode_buku', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$tahunterbit_buku', '$stok_buku', '$rak_id')";
            $result = execute_query($con,$query);
            if(mysqli_affected_rows ($con) !=0 ){
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