<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
$response = array();
//mendapatkan data
$tgl_penjualan = $_POST['tgl_penjualan'];
  $sql = "SELECT penjualan.id_penjualan, pelanggan.nama_pelanggan, penjualan.tgl_penjualan, penjualan.grand_total_penjualan
        FROM penjualan
        INNER JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
        WHERE penjualan.tgl_penjualan='$tgl_penjualan' ORDER BY penjualan.id_penjualan ASC ";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_penjualan'=>$row[0], 'nama_pelanggan'=>$row[1], 'tgl_penjualan'=>$row[2], 'grand_total_penjualan'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
