<?php
session_start();
$nama = $_SESSION['username'];
if (!isset($nama)) {
header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/images/favicon.png" sizes="16x16" type="image/png">
    <title>Aksesoris Club Motor</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/shop-homepage.css" rel="stylesheet">

    <style type="text/css">
    #tag-nama {
        color:white;height:10px;width:170px;margin-top:10px;
    }
    #header_icon img{
        margin-top:-5px;
    }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id="header_icon"><img src="../assets/images/icon_top.png" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="tag-nama" href="#" class="btn btn-primary"><p style="margin-top:-10px;"><?php echo 'Selamat Datang '.$nama; ?></p></a>
                    </li>
                    <li>
                        <a href="barang.php">Barang</a>
                    </li>
                    <li>
                        <a href="kategori_admin.php">Kategori</a>
                    </li>
                    <li>
                        <a href="riwayat.php">Pengaturan</a>
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

            <div class="col-md-12">

                <div class="row carousel-holder">
                    <!-- Untuk tampilan Image Slider -->
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="../assets/images/slider1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="../assets/images/slider2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="../assets/images/slider3.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="../assets/images/slider4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

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
