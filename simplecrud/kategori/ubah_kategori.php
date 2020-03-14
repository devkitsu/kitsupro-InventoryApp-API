<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_kategori= $_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];

  $sql = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Berhasil diperbarui";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Gagal merubah!";
    echo json_encode($response);
  }
  mysqli_close($con);
}
