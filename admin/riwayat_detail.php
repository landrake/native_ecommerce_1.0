<?php
include '../koneksi.php';
session_start();
$nama = $_SESSION['username'];
if (!isset($nama)) {
header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="../assets/images/favicon.png" sizes="16x16" type="image/png">
    <title>Aksclutor Online Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/shop-homepage.css" rel="stylesheet">

</head>
<body>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Barang</th>
                        <th>Harga Total</th>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $id_order = $_GET['id_order'];
                        $grandtotal     = 0;
                        include '../koneksi.php';
                        $sql = " SELECT
                                    order_detail.id_order_detail,
                                    order_detail.id_order,
                                    order_detail.id_barang,
                                    order_detail.jumlah_order,
                                    order_detail.jumlah_harga,
                                    order_detail.catatan,
                                    barang.id_barang,
                                    barang.nama_barang,
                                    barang.id_kategori,
                                    barang.kode_barang,
                                    barang_detail.id_detail_barang,
                                    barang_detail.id_barang,
                                    barang_detail.harga,
                                    barang_detail.jumlah,
                                    barang_detail.foto,
                                    barang_detail.detail_barang,
                                    barang_detail.ringkasan_detail_barang
                                    FROM
                                    order_detail
                                    INNER JOIN barang ON order_detail.id_barang = barang.id_barang
                                    INNER JOIN barang_detail ON barang.id_barang = barang_detail.id_barang
                                    WHERE order_detail.id_order = '$id_order'";
                            $exec = mysql_query($sql);
                            while($val=mysql_fetch_array($exec)){
                                $kd_brg         = $val['kode_barang'];
                                $nm_brg         = $val['nama_barang'];
                                $jml_brg        = $val['jumlah_order'];
                                $hrg_brg        = $val['jumlah_harga'];
                                $total          = $jml_brg*$hrg_brg;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $kd_brg;?></td>
                            <td><?php echo $nm_brg;?></td>
                            <td><?php echo $jml_brg;?></td>
                            <td><?php echo $hrg_brg;?></td>
                            <td><?php echo $total;?></td>
                        </tr>

                        <?php 
                            
                            $grandtotal += $total;
                            $no++;
                            }
                        ?>
                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="5">Total</td>
                            <td colspan="5"><?php echo $grandtotal; ?></td>
                        </tr>
                        <tr style="background-color:#87f977;font-weight:bold;">
                            <td colspan="5">Biaya Pengiriman</td>
                            <?php 
                                include '../koneksi.php';
                                $query = "SELECT * FROM pengiriman WHERE id_pengiriman = '1'";
                                $exec  = mysql_query($query);
                                while ($data = mysql_fetch_array($exec)){
                                $biaya = $data['biaya_pengiriman'];
                            ?>
                            <td colspan="5"><?php echo $biaya; }?></td>
                        </tr>
                        <tr style="background-color:#72e6ea;font-weight:bold;">
                            <td colspan="5">Grand Total</td>
                            <td colspan="5"><?php echo $grandtotal+$biaya; ?></td>
                        </tr>
                    </tfooter>
                </table>
                <hr>
                <div class="row">
                    <?php 
                        $sql_bukti = "SELECT * FROM ecom_haris.bukti_pembayaran WHERE id_order = '$id_order'";
                        $exec = mysql_query($sql_bukti);
                        while($val = mysql_fetch_array($exec)){
                            $poto = $val['bukti_foto'];
                            $norek = $val['no_rek'];
                    ?>
                    <label class="col-sm-4 control-label" >Foto Bukti</label>
                    <div class="col-md-4"><img src="../assets/images/bukti/<?php echo $poto; ?>" width="10%"/><br></div>
                    <label class="col-sm-4 control-label" >No. Rekening</label>
                    <div class="col-md-4"><?php echo $norek; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>
