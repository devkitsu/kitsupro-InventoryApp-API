<?php
require_once('config/koneksi.phpp');
if($_SERVER['REQUEST_METHOD']=='POST') {
$response = array();
//mendapatkan data
$id = $_POST['id_admin'];
  $sql = "SELECT * FROM tb_admin WHERE id_admin='$id'";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_admin'=>$row[0], 'username'=>$row[1], 'nama'=>$row[2],'password'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
