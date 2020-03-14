<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  
$response = array();
//mendapatkan data
$nama_supplier = $_POST['nama_supplier'];
$telepon_supplier = $_POST['telepon_supplier'];
$alamat_supplier = $_POST['alamat_supplier'];

//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM supplier WHERE nama_supplier = '$nama_supplier'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO supplier VALUES (NULL,'$nama_supplier','$telepon_supplier','$alamat_supplier')";
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