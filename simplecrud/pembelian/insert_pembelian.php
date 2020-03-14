<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$id_pembelian = $_POST['id_pembelian'];
$tgl_pembelian = $_POST['tgl_pembelian'];
$id_barang = $_POST['id_barang'];
$id_supplier = $_POST['id_supplier'];
$qty_pembelian = $_POST['qty_pembelian'];
$harga_satuan_pembelian = $_POST['harga_satuan_pembelian'];
$total = $qty_pembelian*$harga_satuan_pembelian;
//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM detail_pembelian WHERE id_pembelian = '$id_pembelian'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
        $sql = "INSERT INTO detail_pembelian VALUES ('$id_pembelian','$id_barang','$qty_pembelian',
                   '$harga_satuan_pembelian','$total');";
        $sql.= "UPDATE barang SET qty_barang=qty_barang+'$qty_pembelian' WHERE id_barang='$id_barang'";
        $query_result = mysqli_multi_query($con,$sql);
        if($query_result){
            $response["value"] = 1;
            $response["message"]="Data sudah diupdate";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "oops! Coba lagi! ".mysqli_error($con);
            echo json_encode($response);
        }
} else {
    $sql = "SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(isset($check)){
        $response["value"] = 0;
        $response["message"] = "Data Faktur Sudah Ada!";
        echo json_encode($response);
    } else{
        $sql = "INSERT INTO pembelian VALUES ('$id_pembelian','$tgl_pembelian','$id_supplier',NULL);";
        $sql.= "INSERT INTO detail_pembelian VALUES ('$id_pembelian','$id_barang','$qty_pembelian',
                   '$harga_satuan_pembelian','$total');";
        $sql.= "UPDATE barang SET qty_barang=qty_barang+'$qty_pembelian' WHERE id_barang='$id_barang'";
        $query_result = mysqli_multi_query($con,$sql);
        if($query_result){
          $response["value"] = 1;
          $response["message"]="Detail telah ditambahkan";
          echo json_encode($response);

          } else {
          $response["value"] = 0;
          $response["message"] = "oops! Coba lagi! ".mysqli_error($con);
          echo json_encode($response);
          }
    }
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
