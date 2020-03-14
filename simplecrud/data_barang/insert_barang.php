<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$nama_barang = $_POST['nama_barang'];
$id_satuan = $_POST['id_satuan'];
$id_kategori = $_POST['id_kategori'];
$qty_barang = $_POST['qty_barang'];

//cek data
require_once('koneksi.php');

$sql = "SELECT * FROM barang WHERE nama_barang = '$nama_barang'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO barang VALUES (NULL,'$nama_barang','$id_kategori','$qty_barang','$id_satuan')";
  if(mysqli_query($con,$sql)){
    $response["value"] = 1;
    $response["message"]="Data sukses ditambahkan!";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi!";
    echo json_encode($response);
  }
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
