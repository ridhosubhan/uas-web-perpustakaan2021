<?php 
function tambah(){
    $con = connect_db();
    // $options = [
    //     'cost' => 10,
    // ];
    
    if(isset($_POST['simpan'])){
        $id_petugas = $_POST['_petugas'];
        $id_anggota = $_POST['_anggota'];

        $username = $_POST['_username'];
        $password = password_hash($_POST['_password'],PASSWORD_DEFAULT);
        $role = $_POST['_role'];

        // KALO YANG DIINPUT DATA PETUGAS
        if(!empty($id_petugas)){
            $query = "SELECT * from tb_user WHERE username='$username'";
            $result = execute_query($con, $query);
            if(mysqli_num_rows($result) > 0){
                echo "
                    <script>
                        window.location.href='index.php';
                        alert('Username Sudah Ada di Database');
                    </script>";
            } else {
                //Update status akun 
                $kueri = "UPDATE tb_petugas SET status_akun=1 WHERE id = '$id_petugas'";
                $update_anggota = execute_query($con, $kueri);

                $queri = "INSERT INTO `tb_user` (`username`, `password`, `role`, `relasi`) VALUES ('$username', '$password', '$role', '$id_petugas')";
                $result = execute_query($con, $queri);
                if (mysqli_affected_rows($con) >0){
                    $_SESSION["suksestambah"] = "Berhasil Menambah Data Akun Petugas";
                    echo "
                        <script>
                            window.location.href='index.php';
                        </script>
                    ";
                }
            }
        }

        // KALO YANG DIINPUT DATA ANGGOTA
        else if(!empty($id_anggota)){
            $query = "SELECT * from tb_user WHERE username='$username'";
            $result = execute_query($con, $query);
            if(mysqli_num_rows($result) > 0){
                echo "
                    <script>
                        window.location.href='index.php';
                        alert('Username Sudah Ada di Database');
                    </script>";
            } else {
                //Update status akun 
                $kueri = "UPDATE tb_anggota SET status_akun=1 WHERE id = '$id_anggota'";
                $update_anggota = execute_query($con, $kueri);

                $queri = "INSERT INTO `tb_user` (`username`, `password`, `role`, `relasi`) VALUES ('$username', '$password', '$role', '$id_anggota')";
                $result = execute_query($con, $queri);
                if (mysqli_affected_rows($con) >0){
                    $_SESSION["suksestambah"] = "Berhasil Menambah Data Akun Anggota";
                    echo "
                        <script>
                            window.location.href='index.php';
                        </script>
                    ";
                }
            }
        }
    }
}

?>