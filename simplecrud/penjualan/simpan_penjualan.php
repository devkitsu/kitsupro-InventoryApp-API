<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$id_penjualan = $_POST['id_penjualan'];
//cek data
require_once('koneksi.php');
$sql = "SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
    $sql = "UPDATE penjualan AS e JOIN
            (SELECT id_penjualan, SUM(total_harga_penjualan) AS sum_penjualan FROM detail_penjualan
            WHERE id_penjualan='$id_penjualan') AS grp ON grp.id_penjualan = e.id_penjualan
            SET e.grand_total_penjualan = grp.sum_penjualan WHERE e.id_penjualan ='$id_penjualan' ";
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
    $response["message"] = "oops! Coba lagi!  ".mysqli_error($con);
    echo json_encode($response);
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
