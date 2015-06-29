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
                <?php
                        $no = 1;
                        include '../koneksi.php';
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
                                            WHERE barang.id_barang = '".$_GET['id_barang']."'";
                        $sql=mysql_query($query);
                        while($data=mysql_fetch_array($sql)){
                            $det = $data['detail_barang'];
                            $ring = $data['ringkasan_detail_barang'];
                    ?>
                <form method="post" action="barang_proses_ubah.php" class="form-horizontal" enctype="multipart/form-data">
                    <input name="idbrg" value="<?php echo $data['id_barang']; ?>" hidden/>
                    <input name="iddetbrg" value="<?php echo $data['id_detail_barang']; ?>" hidden/>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-4">
                            <input class="form-control" rows="4" name="nm_brg" value="<?php echo $data['nama_barang']; ?>"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Kode Barang</label>
                        <div class="col-sm-4">
                            <input class="form-control" rows="4" name="kd_brg" value="<?php echo $data['kode_barang']; ?>"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Harga Barang</label>
                        <div class="col-sm-4">
                            <input class="form-control" rows="4" name="hrg_brg" value="<?php echo $data['harga']; ?>"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Jumlah Barang</label>
                        <div class="col-sm-4">
                            <input class="form-control" rows="4" name="jml_brg" value="<?php echo $data['jumlah']; ?>"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Upload Foto</label><br>
                        <div class="col-sm-10">
                            <img src="../assets/images/<?php echo $data['foto']; ?>" width="100" />
                            <input type="file" name="userfile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Kategori</label><br>
                        <div class="col-sm-4">
                            <select class="form-control" rows="4" name="kategori" >
                                <?php
                                    include "../koneksi.php";
                                    $sql=mysql_query("SELECT * FROM barang_kategori");
                                    while($data=mysql_fetch_array($sql)){
                                ?>
                                <option value="<?php echo "$data[id_kategori]"; ?>"><?php echo "$data[nama_kategori]"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Ringkasan Detail</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" rows="4" name="ringkas_det"><?php echo htmlspecialchars($ring); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Detail</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" rows="4" name="detail"><?php echo htmlspecialchars($det); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success" autofocus="none">Simpan</button>
                        </div>
                    </div>
                </form>
                <?php $no++; }?>

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
