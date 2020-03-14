<?php
if($_SERVER['REQUEST_METHOD']=='REQUEST'){
  
$response = array();
//mendapatkan data
$nama_barang = $_POST['nama_barang'];
$nama_kategori = $_REQUEST['nama_kategori'];
$nama_satuan = $_REQUEST['nama_satuan'];
$qty_barang = $_POST['qty_barang'];


//cek data
require_once('koneksi.php');
function idkategori(){
    $satu = "SELECT id_kategori from kategori where nama_kategori == '$nama_kategori'";
    $id_kategori = $satu;
}
function idsatuan(){
    $dua = "SELECT id_satuan from satuan where nama_satuan == '$nama_satuan'";
    $id_satuan = $dua;
}
idkategori();
idsatuan();
echo $id_kategori;
echo $id_satuan;
}
?>