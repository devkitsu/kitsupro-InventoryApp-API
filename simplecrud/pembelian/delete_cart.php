<?php
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $response = array();
  //mendapatkan data
  $id_pembelian = $_POST['id_pembelian'];
  $id_barang = $_POST['id_barang'];
  $qty_pembelian = $_POST['qty_pembelian'];
  $sql = "DELETE FROM detail_pembelian WHERE id_pembelian='$id_pembelian' AND id_barang = '$id_barang';";
    $sql.= "UPDATE barang SET qty_barang=qty_barang-'$qty_pembelian' WHERE id_barang = '$id_barang'";
    $query_result = mysqli_multi_query($con,$sql);
  $msg=mysqli_error($con);
  if($query_result) {
    $response["value"] = 1;
    $response["message"] = "Berhasil dihapus";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Gagal dihapus! \n\n Error Karena:\n".mysqli_error($con);
    echo json_encode($response);
  }
  mysqli_close($con);
}
