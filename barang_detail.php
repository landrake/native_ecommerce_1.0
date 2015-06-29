<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png" sizes="16x16" type="image/png">
    <title>Aksclutor</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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

                        $sql = mysql_query("SELECT * FROM barang where id_barang = '".$_GET['id_barang']."'");
                        while($data = mysql_fetch_array($sql)){
                        $tes = $data['nama_barang'];

                    ?>
                    <div class="col-md-12">

                        <h1><?php echo $tes; ?></h1>
                        <hr>

                    </div>

                    <?php } ?>

                </div>

                <div class="row">

                    <?php

                        $query  = " SELECT
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
                                            WHERE barang.id_barang = '".$_GET['id_barang']."' ";
                        $sql    = mysql_query($query);
                        while($data=mysql_fetch_array($sql)){
                            if(count($data) == ''){
                                echo "Data Kosong";
                            }else{
                            $foto_barang    = $data['foto'];
                            $harga_barang   = $data['harga'];
                            $nama_barang    = $data['nama_barang'];
                            $detail_barang  = $data['detail_barang'];
                            $jumlah         = $data['jumlah'];

                    ?>

                    
                        <div class="thumbnail">
                            <img class="img-responsive" src="assets/images/<?php echo $foto_barang; ?>" alt="">
                            <div class="caption-full">
                                <h4 class="pull-right"><?php echo $harga_barang; ?></h4>
                                <h4><?php echo $nama_barang; ?></a>
                                </h4>
                                <p>Stok Barang : <?php echo $jumlah; ?></p>
                                <p><?php echo $detail_barang; ?></p>
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
