<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$uid = uniqid('', true);
//cek data
$sql = "SELECT * FROM tb_admin WHERE username ='admin' OR username = 'Admin' OR username='ADMIN'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(empty($check)){
        $sql2 = "INSERT INTO tb_admin VALUES ('1','$uid','$username','$password','$nama')";
        $query_result2 = mysqli_query($con,$sql2);
        if($query_result2){
            $response["value"] = 1;
            $response["message"]="Admin Berhasil Registrasi! \nSilahkan Login";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Tidak bisa daftar. \nAdmin sudah terdaftar!";
            echo json_encode($response);
        }
    } else {
        $response["value"] = 0;
        $response["message"]="Tidak bisa daftar. \nAdmin sudah terdaftar!";
        echo json_encode($response);
    }
mysqli_close($con);
}
  ?>
