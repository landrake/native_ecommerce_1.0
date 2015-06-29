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

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><h2>Profil Member</h2></strong></div>
                    <div class="panel-body">
                        <div class="form-group form-group-sm" >
                            <?php 
                                include '../koneksi.php';
                                $sql = "SELECT
                                        user.id_user,
                                        user.username,
                                        user.password,
                                        user.akses,
                                        user_detail.id_detail_user,
                                        user_detail.id_user,
                                        user_detail.nama_depan,
                                        user_detail.nama_blkg,
                                        user_detail.alamat,
                                        user_detail.telp,
                                        user_detail.email
                                        FROM
                                        user
                                        INNER JOIN user_detail ON user.id_user = user_detail.id_user
                                        where user.id_user = '".$_SESSION['id_user']."'";
                                $exec = mysql_query($sql);
                                while($data = mysql_fetch_array($exec)){
                                    $alamat = $data['alamat'];
                            ?>
                            <form action="proses_profil_edit.php" method="post" enctype="multipart/form-data">
                                <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Nama Depan</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="formGroupInputSmall" value="<?php echo $data['nama_depan'];?>" name="nm_dpn">
                                </div><br><br>
                                <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Nama Belakang</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="formGroupInputSmall" value="<?php echo $data['nama_blkg'];?>" name="nm_blkg">
                                </div><br><br>
                                <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" type="text" name="almt" style="height:100px;margin-bottom:10px;"><?php echo htmlspecialchars($alamat); ?></textarea>
                                </div>
                                <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Telepon</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="formGroupInputSmall" value="<?php echo $data['telp'];?>" name="tlp" style="margin-bottom:10px;">
                                </div>
                                <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Email</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="formGroupInputSmall" value="<?php echo $data['email'];?>" name="email" style="margin-bottom:10px;">
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-lg btn-success btn-block" type="submit" style="width:200px;text-align:center">Edit !</button>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
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
