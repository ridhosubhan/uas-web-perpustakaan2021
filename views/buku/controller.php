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
        $kode_buku = kodebuku();
        $judul_buku = $_POST['_judulbuku'];
        $penulis_buku = $_POST['_penulis'];
        $penerbit_buku = $_POST['_penerbit'];
        $tahunterbit_buku = $_POST['_tahunterbit'];
        $stok_buku = $_POST['_stok'];
        $rak_id = $_POST['_rakbuku'];

        if(isset($_FILES['_gambar'])){
            $errors = array();
            $file_name = trim($_FILES['_gambar']['name']);
            $file_size = $_FILES['_gambar']['size'];
            $file_tmp = $_FILES['_gambar']['tmp_name'];
            $file_type = $_FILES['_gambar']['type'];
            $tmp = explode('.', $file_name);
            $file_ext = strtolower(end($tmp));
            $extensions = array("jpeg","jpg","png");

            if(in_array($file_ext, $extensions) == FALSE){
                echo "
                    <script>
                        alert('File harus gambar dengan format JPEG, JPG, atau PNG.');
                    </script>";
            }else if(($file_size > 2097152) || ($file_size == 0)){
                echo "
                    <script>
                        alert('Maksimal ukuran file 2MB.');
                    </script>";
            }else{
                if(move_uploaded_file($file_tmp, "../../images/".$file_name)){
                    $query = "INSERT INTO `tb_buku` (`kode_buku`, `judul`, `sampul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `id_rak`) VALUES ('$kode_buku', '$judul_buku', '$file_name', '$penulis_buku', '$penerbit_buku', '$tahunterbit_buku', '$stok_buku', '$rak_id')";
                    $result = execute_query($con,$query);
                    if(mysqli_affected_rows ($con) !=0 ){
                        $_SESSION["suksestambah"] = "Berhasil Menambah Data";
                        echo "
                            <script>
                                window.location.href='index.php';
                            </script>
                        ";
                    }
                }else{
                    echo "
                    <script>
                        alert('Tidak dapat upload foto');
                    </script>";
                }
            }
        }
    }
}

?>