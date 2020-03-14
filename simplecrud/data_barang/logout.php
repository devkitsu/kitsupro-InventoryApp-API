
<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT pembelian.id_pembelian, supplier.nama_supplier, pembelian.tgl_pembelian, pembelian.grand_total_pembelian
        FROM pembelian
        INNER JOIN supplier ON supplier.id_supplier = pembelian.id_supplier
        where supplier.nama_supplier LIKE '%$search%' ORDER BY pembelian.id_pembelian ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_pembelian'=>$row[0], 'nama_supplier'=>$row[1], 'tgl_pembelian'=>$row[2], 'grand_total_pembelian'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
