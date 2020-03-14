<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM supplier ORDER BY id_supplier ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_supplier'=>$row[0], 'nama_supplier'=>$row[1], 'telepon_supplier'=>$row[2],'alamat_supplier'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}