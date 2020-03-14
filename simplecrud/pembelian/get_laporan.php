<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
$response = array();
//mendapatkan data
$tgl_pembelian = $_POST['tgl_pembelian'];
  $sql = "SELECT pembelian.id_pembelian, supplier.nama_supplier, pembelian.tgl_pembelian, pembelian.grand_total_pembelian
        FROM pembelian
        INNER JOIN supplier ON supplier.id_supplier = pembelian.id_supplier
        WHERE pembelian.tgl_pembelian='$tgl_pembelian' ORDER BY pembelian.id_pembelian ASC ";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_pembelian'=>$row[0], 'nama_supplier'=>$row[1], 'tgl_pembelian'=>$row[2], 'grand_total_pembelian'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
