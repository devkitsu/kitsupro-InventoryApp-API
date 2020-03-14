<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_pelanggan= $_POST['id_pelanggan'];
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $telepon_pelanggan=$_POST['telepon_pelanggan'];
  $alamat_pelanggan=$_POST['alamat_pelanggan'];

  $sql = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', telepon_pelanggan='$telepon_pelanggan',
            alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan = '$id_pelanggan'";
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
