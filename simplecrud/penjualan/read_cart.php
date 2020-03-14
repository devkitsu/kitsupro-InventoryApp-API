<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
$response = array();
//mendapatkan data
$id_penjualan = $_POST['id_penjualan'];
  $sql = "SELECT detail_penjualan.id_penjualan, barang.id_barang, barang.nama_barang, detail_penjualan.qty_penjualan,
        satuan_barang.nama_satuan, detail_penjualan.harga_satuan_penjualan
        FROM detail_penjualan
        INNER JOIN barang ON barang.id_barang = detail_penjualan.id_barang
        INNER JOIN satuan_barang ON barang.id_satuan = satuan_barang.id_satuan
        WHERE id_penjualan='$id_penjualan' ORDER BY detail_penjualan.id_barang ASC ";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_penjualan'=>$row[0], 'id_barang'=>$row[1], 'nama_barang'=>$row[2],'qty_penjualan'=>$row[3]
                                ,'nama_satuan'=>$row[4],'harga_satuan_penjualan'=>$row[5]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
