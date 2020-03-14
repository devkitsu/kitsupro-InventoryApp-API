
<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT * FROM satuan_barang where nama_satuan LIKE '%$search%' ORDER BY nama_satuan ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_satuan'=>$row[0], 'nama_satuan'=>$row[1], ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
