
<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT barang.id_barang, barang.nama_barang, barang.qty_barang, satuan_barang.nama_satuan, kategori.nama_kategori
  FROM barang
  left join kategori on kategori.id_kategori=barang.id_kategori
  left join satuan_barang on satuan_barang.id_satuan=barang.id_satuan
  where nama_barang LIKE '%$search%' ORDER BY nama_barang ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_barang'=>$row[0], 'nama_barang'=>$row[1], 'qty_barang'=>$row[2],'nama_satuan'=>$row[3], 'nama_kategori'=>$row[4]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
