<?php
include '../koneksi.php';
session_start();
$nama = $_SESSION['username'];
if (!isset($nama)) {
header('Location:../login.php');
}
$id_order = $_GET['id_order'];
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

    </script>
</head>
<body>


    <!-- Page Content -->
    <div class="container" id="mydiv">
    <A HREF="javascript:window.print()">PRINT BUKTI</A>&nbsp;|&nbsp;<A HREF="index.php">BERANDA</A>
        <div class="row">
            <div class="col-md-12">
                <?php
                    include '../koneksi.php';
                    $sql_orderid = " SELECT * FROM ecom_haris.order WHERE id_order = '$id_order' ";
                    $exec = mysql_query($sql_orderid);
                    while ($val = mysql_fetch_array($exec)) {
                        $no_pembelian = $val['no_pemesanan'];
                        $id_user = $val['id_user'];
                    }

                    $sql_masbro = "SELECT * FROM ecom_haris.user_detail WHERE id_user = '$id_user' ";
                    $execlg = mysql_query($sql_masbro);
                    while ($val = mysql_fetch_array($execlg)) {
                        $nm_dpn = $val['nama_depan'];
                        $nm_blkg = $val['nama_blkg'];
                        $almt  = $val['alamat'];
                        $telp  = $val['telp'];
                    }
                ?>
                <div class="panel panel-default" style="font-size:8px">
                    <div class="panel-heading text-center"><h3><strong>INVOICE PEMBELIAN</strong></h3></div>
                    <div class="panel-body" >
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><strong>Data Pengirim</strong></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">ID ORDER</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $no_pembelian; ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-4">NAMA</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $nm_dpn.' '.$nm_blkg; ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-4">ALAMAT</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $almt; ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-4">TELEPON</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $telp; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><strong>Data Penerima</strong></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">NAMA</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $nm_dpn.' '.$nm_blkg; ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-4">ALAMAT</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $almt; ?></div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-4">TELEPON</div>
                                            <div class="col-md-8">:&nbsp;<?php echo $telp; ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="row">
                            
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
                                    
                                    include '../koneksi.php';
                                    $no = 1;
                                    $grandtotal     = 0;
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
                                            $hrg_brg        = $val['harga'];
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
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            
                        </div>
                        <div class="col-md-4">
                            <p>Ttd. Penerima</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
                        </div>
                    </div>
                    <div class="panel-footer">
                    <small>Barang yang sudah dibeli tidak dapat dikembalikan lagi</small>
                    </div>
                </div>

            </div>

        </div>
        
    </div>
    <!-- /.container -->
    <!--<a href="print.html"  onclick="window.open('print.html', 'newwindow', 'width=300, height=250'); return false;"> Print</a>-->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
