<?php
require_once('koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_barang= $_POST['id_barang'];
  $nama_barang = $_POST['nama_barang'];
  $id_satuan = $_POST['id_satuan'];
  $id_kategori = $_POST['id_kategori'];

  $sql = "UPDATE barang SET nama_barang= '$nama_barang', id_kategori='$id_kategori',
             id_satuan='$id_satuan' WHERE id_barang = '$id_barang'";
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
