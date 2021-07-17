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
            header('location:login.php');
            exit();
        }
    }

    function is_admin(){
        if($_SESSION['role']!='ADMIN'){
            return false;
        }
        return true;
        // if(!isset($_SESSION['role'])){
        // }
    }
?>