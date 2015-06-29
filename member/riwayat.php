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
<style type="text/css">
    #header_icon img{
        margin-top:-5px;
    }
    #costum-nav{
        background: -moz-linear-gradient(top,  rgba(0,0,0,1) 0%, rgba(0,0,0,0.65) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,1)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.65) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.65) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.65) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.65) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#a6000000',GradientType=0 ); /* IE6-9 */

    }
    #tag-nama {
        color:white;height:10px;width:200px;margin-top:10px;
    }
</style>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="costum-nav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" id="header_icon"><img src="../assets/images/icon_top.png" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="tag-nama" href="#" class="btn btn-primary"><p style="margin-top:-10px;"><?php echo 'Selamat Datang '.$nama; ?></p></a>
                    </li>
                    <li>
                        <a href="index.php">Beranda</a>
                    </li>
                    <li>
                        <a href="keranjang.php">Keranjang</a>
                    </li>
                    <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="profil.php">Profil</a>
                    </li>
                    <li>
                        <a href="riwayat.php">Riwayat</a>
                    </li>
                    <li>
                        <a href="../logout.php">Keluar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Kode Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        include '../koneksi.php';
                        $sql = "SELECT * FROM ecom_haris.order WHERE id_user = '".$_SESSION['id_user']."' ";
                        $exec = mysql_query($sql);
                        while($val = mysql_fetch_array($exec)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $val['no_pemesanan']; ?></td>
                            <td><?php echo $val['tgl_order']; ?></td>
                            <td><?php echo $val['total_harga']; ?></td>
                            <td>
                                <?php

                                $status = $val['status']; 
                                if ($status == '1') {
                                    echo "<a class='btn btn-primary' href='bukti_pembayaran.php?id_order=".$val['id_order']."'>Kirim Bukti Pembayaran</a>";
                                }
                                if ($status == '2') {
                                    echo " Menunggu Konfirmasi Admin";
                                }
                                if ($status == '3') {
                                    echo " Barang Sedang Dikirim<a class='btn btn-primary' href='terima_barang.php?id_order=".$val['id_order']."'>Terima</a>";
                                }
                                if ($status == '4') {
                                    echo "Transaksi Selesai";
                                }
                                ?>
                            </td>
                            <td><a href="#" onclick="window.open('riwayat_detail.php?id_order=<?php echo $val['id_order'];?>', 'newwindow', 'width=700, height=300'); return false;" class="glyphicon glyphicon-search"></a></td>
                        </tr>
                    <?php $no++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!--<a href="print.html"  onclick="window.open('print.html', 'newwindow', 'width=300, height=250'); return false;"> Print</a>-->
    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Aksclutor</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>
