<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$nama_kategori = $_POST['nama_kategori'];
//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO kategori VALUES (NULL,'$nama_kategori')";
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
  $response["message"] = "oops! Data belum diisi!";
  echo json_encode($response);
}
  ?>
