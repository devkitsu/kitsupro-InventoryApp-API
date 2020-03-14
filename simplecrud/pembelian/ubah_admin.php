<?php
require_once('config/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id= $_POST['id_admin'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $nama = $_POST['nama'];

  $sql = "UPDATE tb_admin SET nama = '$nama', password = '$password', username = '$usernmae'
            WHERE id_admin = '$id'";
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Data Admin Berhasil Diperbarui";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Gagal merubah!";
    echo json_encode($response);
  }
  mysqli_close($con);
}
