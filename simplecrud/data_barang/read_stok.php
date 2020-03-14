<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {

    $sql = "SELECT barang.id_barang, barang.nama_barang, kategori.nama_kategori, barang.qty_barang, satuan_barang.nama_satuan
    FROM barang
    INNER JOIN satuan_barang ON barang.id_satuan = satuan_barang.id_satuan
	INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori ORDER BY id_barang ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_barang'=>$row[0], 'nama_barang'=>$row[1],'nama_kategori'=>$row[2], 'qty_barang'=>$row[3],'nama_satuan'=>$row[4] ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
