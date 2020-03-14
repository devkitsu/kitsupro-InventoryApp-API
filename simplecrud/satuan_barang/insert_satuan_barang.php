<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$nama_satuan = $_POST['nama_satuan'];
//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM satuan_barang WHERE nama_satuan = '$nama_satuan'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO satuan_barang VALUES (NULL,'$nama_satuan')";
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
