<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_supplier= $_POST['id_supplier'];
  $nama_supplier = $_POST['nama_supplier'];
  $telepon_supplier=$_POST['telepon_supplier'];
  $alamat_supplier=$_POST['alamat_supplier'];

  $sql = "UPDATE supplier SET nama_supplier = '$nama_supplier', telepon_supplier='$telepon_supplier',
            alamat_supplier='$alamat_supplier' WHERE id_supplier = '$id_supplier'";
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
