<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_satuan= $_POST['id_satuan'];
  $nama_satuan = $_POST['nama_satuan'];

  $sql = "UPDATE satuan_barang SET nama_satuan = '$nama_satuan' WHERE id_satuan = '$id_satuan'";
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
