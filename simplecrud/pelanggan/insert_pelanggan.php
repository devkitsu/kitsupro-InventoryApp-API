<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$nama_pelanggan = $_POST['nama_pelanggan'];
$telepon_pelanggan = $_POST['telepon_pelanggan'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];

//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM pelanggan WHERE nama_pelanggan = '$nama_pelanggan'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO pelanggan VALUES (NULL,'$nama_pelanggan','$telepon_pelanggan','$alamat_pelanggan')";
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
