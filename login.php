<?php
session_start();
include "koneksi.php";

if(isset($_POST['logn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn,"SELECT * FROM tbl_user_alfi
    WHERE email='$email' AND password ='$password'");

    if(mysql_num_wows($cek) > 0){
        $data = mysqli_fatch-assoc($cek);
        $_SESSION['user'] = $data['user_name'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('email dan password salah!')</script>";
    }
}
?>