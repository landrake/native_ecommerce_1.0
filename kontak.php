<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="assets/images/favicon.png" sizes="16x16" type="image/png">
    <title>Aksclutor Online Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/shop-homepage.css" rel="stylesheet">

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
                <a class="navbar-brand" href="#" id="header_icon"><img src="assets/images/icon_top.png" /></a>
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
                        include "koneksi.php";
                        $sql=mysql_query("SELECT * FROM barang_kategori");
                        while($data=mysql_fetch_array($sql)){
                    ?>
                    <a href="barang.php?id_kategori=<?php echo "$data[id_kategori]"; ?>" class="list-group-item">
                    <?php echo "$data[nama_kategori]"; ?></a>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">
                    <!-- Untuk tampilan Image Slider -->
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="assets/images/slider1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="assets/images/slider2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="assets/images/slider3.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="assets/images/slider4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <article style="text-align:justify;">
                    <h3>Hubungi Aksclutor di</h3>
                    <br>
                    <p>Whatsapp : 08912039481</p>
                    <p>LINE : aksclutor</p>
                    <p>Hotline : 021-1234567</p>
                    <p>BBM : ak4efo4</p>
                </article>
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
