<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$id_pembelian = $_POST['id_pembelian'];
//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
    $sql = "UPDATE pembelian AS e JOIN
            (SELECT id_pembelian, SUM(total_harga_pembelian) AS sum_pembelian FROM detail_pembelian
            WHERE id_pembelian='$id_pembelian') AS grp ON grp.id_pembelian = e.id_pembelian
            SET e.grand_total_pembelian = grp.sum_pembelian WHERE e.id_pembelian ='$id_pembelian' ";
    if(mysqli_query($con,$sql)){
        $response["value"] = 1;
        $response["message"]="Data sudah diupdate";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi! ".mysqli_error($con);
        echo json_encode($response);
    }
} else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi! ".mysqli_error($con);
    echo json_encode($response);
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
