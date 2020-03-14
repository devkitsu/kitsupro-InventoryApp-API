        <?php
        require_once('koneksi.php');
        if($_SERVER['REQUEST_METHOD']=='POST') {
        $response = array();
        //mendapatkan data
        $id_pembelian = $_POST['id_pembelian'];
          $sql = "SELECT barang.nama_barang, detail_pembelian.qty_pembelian, detail_pembelian.harga_satuan_pembelian,
                         detail_pembelian.total_harga_pembelian
                FROM detail_pembelian
                INNER JOIN barang ON barang.id_barang = detail_pembelian.id_barang
                WHERE detail_pembelian.id_pembelian ='$id_pembelian' ORDER BY detail_pembelian.id_barang ASC ";
          $res = mysqli_query($con,$sql);
          $result = array();
          while($row = mysqli_fetch_array($res)){
            array_push($result, array('nama_barang'=>$row[0],'qty_pembelian'=>$row[1], 'harga_satuan_pembelian'=>$row[2],
                                        'total_harga_pembelian'=>$row[3]));
          }
          echo json_encode(array("value"=>1,"result"=>$result));
          mysqli_close($con);
        }
