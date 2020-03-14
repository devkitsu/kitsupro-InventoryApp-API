<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_pelanggan'=>$row[0], 'nama_pelanggan'=>$row[1], 'telepon_pelanggan'=>$row[2],'alamat_pelanggan'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}