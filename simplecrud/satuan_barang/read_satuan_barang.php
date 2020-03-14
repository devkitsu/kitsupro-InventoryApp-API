<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM satuan_barang ORDER BY id_satuan ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_satuan'=>$row[0], 'nama_satuan'=>$row[1]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}