<?php
    function connect_db(){
        $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME)
            or die(mysqli_connect_error());
        return $conn;
    }

    function execute_query($conn,$query){
        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
        return $result;
    }

    function close($conn){
        mysqli_close($conn);
    }

    function cek_session(){
        session_start();
        if(!isset($_SESSION['isLogin'])){
            header("location:".BASEPATH."login.php");
            exit();
        }
    }

    function not_admin(){
        if($_SESSION['isRole']=='Anggota'){
            return true;
        }
        return false;
    }

    function is_admin(){
        if($_SESSION['isRole']!='Anggota'){
            return true;
        }
        return false;
    }

    function data_akun(){
        $username=$_SESSION['isUsername'];
        $conn = connect_db();
        $query = "SELECT * FROM tb_user WHERE username='$username'";
        $result = execute_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        
        $relasi = $data['relasi'];
        //SELECT DATA ANGGOTA
        if($_SESSION['isRole']=='Anggota'){
            $query = "SELECT * FROM tb_anggota WHERE id='$relasi'";
            $result = execute_query($conn, $query);
            $GLOBALS['profile_anggota'] = mysqli_fetch_assoc($result);
        }
        //SELECT DATA SELAIN ANGGOTA
        else{
            $query = "SELECT * FROM tb_petugas WHERE id='$relasi'";
            $result = execute_query($conn, $query);
            $GLOBALS['profile_petugas'] = mysqli_fetch_assoc($result);
        }
    }
?>