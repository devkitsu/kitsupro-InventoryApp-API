<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$id_penjualan = $_POST['id_penjualan'];
$tgl_penjualan = $_POST['tgl_penjualan'];
$id_barang = $_POST['id_barang'];
$id_pelanggan = $_POST['id_pelanggan'];
$qty_penjualan = $_POST['qty_penjualan'];
$harga_satuan_penjualan = $_POST['harga_satuan_penjualan'];
$total = $qty_penjualan*$harga_satuan_penjualan;
//cek data
require_once('koneksi.php');
$qry = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$cek = mysqli_fetch_array(mysqli_query($con,$qry));
if($cek['qty_barang']<$qty_penjualan){
    $response["value"] = 0;
    $response["message"] = "Qty barang tidak mencukupi, Harap melakukan pembelian dahulu! Qty barang adalah ".$cek['qty_barang'];
    echo json_encode($response);
} else {
    $sql = "SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(isset($check)){
        $sql = "INSERT INTO detail_penjualan VALUES ('$id_penjualan','$id_barang','$qty_penjualan',
               '$harga_satuan_penjualan','$total');";
               $sql.= "UPDATE barang SET qty_barang=qty_barang-'$qty_penjualan' WHERE id_barang='$id_barang'";
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
        $sql = "INSERT INTO penjualan VALUES ('$id_penjualan','$tgl_penjualan','$id_pelanggan',NULL);";
        $sql.= "INSERT INTO detail_penjualan VALUES ('$id_penjualan','$id_barang','$qty_penjualan',
             '$harga_satuan_penjualan','$total');";
             $sql.= "UPDATE barang SET qty_barang=qty_barang-'$qty_penjualan' WHERE id_barang='$id_barang'";
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
