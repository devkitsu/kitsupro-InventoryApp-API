
<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT * FROM kategori where nama_kategori LIKE '%$search%' ORDER BY nama_kategori ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_kategori'=>$row[0], 'nama_kategori'=>$row[1], ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
