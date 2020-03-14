<?

require_one(koneksi.php);

$sql = "SELECT" * FROM kategori;

$r = mysqli_query($con,$sql);
$result = array();

while($row = mysqli_fetch_array($r)){
        array_push($result,array(
            "name"=>$row['nama']
        ));
}

echo json_encode(array('result=>$result));

mysqli_close($con);