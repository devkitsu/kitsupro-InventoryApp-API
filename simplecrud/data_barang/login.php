<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
    $username = $_POST['username'];
    $password = md5($_POST['password']);
  $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password' ";
  $res = mysqli_query($con,$sql);
  $row = mysqli_fetch_array ($res);
  if (!empty($row)) {
        // admin ditemukan
        $nama = $row['username'];
        $response["value"] = 1;
        $response["message"] = "Login Berhasil!\nSelamat Datang $nama";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
    }
}
