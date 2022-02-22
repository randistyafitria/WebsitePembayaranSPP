<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$login=mysqli_query($conn,"select * from petugas where username = '".$username."' and password = '".md5($password)."'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    if($data['level'] == "admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        $_SESSION['status_login']=true;
        //mengalihkan ke halaman admin
        header("location: dashboard.php");
    } else if ($data['level'] == "petugas"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        $_SESSION['status_login']=true;
        //mengalihkan ke halaman petugas
        header("location: dashboard_petugas.php");
    } else {
        //mengalihkan ke halaman login kembali
        header("location: login.php?pesan=gagal login");
    }
} else {
    header("location:login.php?pesan=gagal");
}
?>