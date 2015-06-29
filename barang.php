<!DOCTYPE html>
<?php 
include "koneksi.php";
?>
<html lang="en">

<head>

    <link rel="icon" href="assets/images/favicon.png" sizes="16x16" type="image/png">
    <title>Aksclutor Online Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/shop-homepage.css" rel="stylesheet">

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
    </style>
</head>

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
                <a class="navbar-brand" href="index.php" id="header_icon"><img src="assets/images/icon_top.png" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="tentang.php">Tentang</a>
                    </li>
                    <li>
                        <a href="pelayanan.php">Pelayanan</a>
                    </li>
                    <li>
                        <a href="kontak.php">Kontak</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
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

            <div class="col-md-3">
                <p class="lead">Kategori</p>
                <div class="list-group">
                    <?php
                        $sql=mysql_query("SELECT * FROM barang_kategori");
                        while($data=mysql_fetch_array($sql)){
                    ?>
                    <a href="barang.php?id_kategori=<?php echo "$data[id_kategori]"; ?>" class="list-group-item"><?php echo "$data[nama_kategori]"; ?></a>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-9">
            
                <div class="row">

                    <?php

                        $sql = mysql_query("SELECT * FROM barang_kategori where id_kategori = '".$_GET['id_kategori']."'");
                        while($data = mysql_fetch_array($sql)){
                            if(count($data) == ''){
                                echo "<div class='col-md-12' style='background-color:red;opacity:0.3;'>Data Kosong</div>";
                            }else{
                        $tes = $data['nama_kategori'];

                    ?>
                    <div class="col-md-12">

                        <h1><?php echo $tes; ?></h1>
                        <hr>

                    </div>

                    <?php }} ?>
                </div>

                <div class="row">

                    <?php

                        $query = " SELECT
                                            barang_detail.id_detail_barang,
                                            barang_detail.id_barang,
                                            barang_detail.harga,
                                            barang_detail.jumlah,
                                            barang_detail.foto,
                                            barang_detail.detail_barang,
                                            barang_detail.ringkasan_detail_barang,
                                            barang.id_barang,
                                            barang.nama_barang,
                                            barang.id_kategori,
                                            barang.kode_barang,
                                            barang_kategori.id_kategori,
                                            barang_kategori.nama_kategori
                                            FROM
                                            barang
                                            INNER JOIN barang_detail ON barang.id_barang = barang_detail.id_barang
                                            INNER JOIN barang_kategori ON barang.id_kategori = barang_kategori.id_kategori
                                            WHERE barang_kategori.id_kategori = '".$_GET['id_kategori']."' ";
                        $sql=mysql_query($query);
                        while($data=mysql_fetch_array($sql)){
                            if(count($data) == ''){
                                echo "Data Kosong";
                            }else{
                            $foto_barang=$data['foto'];
                            $harga_barang=$data['harga'];
                            $nama_barang=$data['nama_barang'];
                            $ringkas_barang=$data['ringkasan_detail_barang'];

                    ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="assets/images/<?php echo $foto_barang; ?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $harga_barang; ?></h4>
                                <h4><a href="barang_detail.php?id_barang=<?php echo "$data[id_barang]"; ?>"><?php echo $nama_barang; ?></a>
                                </h4>
                                <p><?php echo $ringkas_barang; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php }} ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Aksclutor 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>