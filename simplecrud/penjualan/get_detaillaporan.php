        <?php
        require_once('koneksi.php');
        if($_SERVER['REQUEST_METHOD']=='POST') {
        $response = array();
        //mendapatkan data
        $id_penjualan = $_POST['id_penjualan'];
          $sql = "SELECT barang.nama_barang, detail_penjualan.qty_penjualan, detail_penjualan.harga_satuan_penjualan,
                         detail_penjualan.total_harga_penjualan
                FROM detail_penjualan
                INNER JOIN barang ON barang.id_barang = detail_penjualan.id_barang
                WHERE detail_penjualan.id_penjualan ='$id_penjualan' ORDER BY detail_penjualan.id_barang ASC ";
          $res = mysqli_query($con,$sql);
          $result = array();
          while($row = mysqli_fetch_array($res)){
            array_push($result, array('nama_barang'=>$row[0],'qty_penjualan'=>$row[1], 'harga_satuan_penjualan'=>$row[2],
                                        'total_harga_penjualan'=>$row[3]));
          }
          echo json_encode(array("value"=>1,"result"=>$result));
          mysqli_close($con);
        }
