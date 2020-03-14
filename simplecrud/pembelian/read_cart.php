<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
$response = array();
//mendapatkan data
$id_pembelian = $_POST['id_pembelian'];
  $sql = "SELECT detail_pembelian.id_pembelian, barang.id_barang, barang.nama_barang, detail_pembelian.qty_pembelian,
        satuan_barang.nama_satuan, detail_pembelian.harga_satuan_pembelian
        FROM detail_pembelian
        INNER JOIN barang ON barang.id_barang = detail_pembelian.id_barang
        INNER JOIN satuan_barang ON barang.id_satuan = satuan_barang.id_satuan
        WHERE id_pembelian='$id_pembelian' ORDER BY detail_pembelian.id_barang ASC ";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_pembelian'=>$row[0], 'id_barang'=>$row[1], 'nama_barang'=>$row[2],'qty_pembelian'=>$row[3]
                                ,'nama_satuan'=>$row[4],'harga_satuan_pembelian'=>$row[5]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
