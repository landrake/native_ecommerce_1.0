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
            <a class="btn btn-primary" href="barang_admin_tambah.php">Tambah Barang</a>
            <table class="table">
                
                <thead>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tampilan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Pilihan</th>
                </thead>
                <tbody>
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
                                            INNER JOIN barang_kategori ON barang.id_kategori = barang_kategori.id_kategori";
                        $sql=mysql_query($query);
                        while($data=mysql_fetch_array($sql)){
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><img src="../assets/images/<?php echo $data['foto']; ?>" width="60" /></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><?php echo $data['jumlah']; ?></td>
                        <td>
                            <a href="barang_admin_ubah.php?id_barang=<?php echo $data['id_barang']; ?>">Edit</a>
                            | <a href="barang_proses_hapus.php?id_barang=<?php echo $data['id_barang']; ?>">Delete</a>
                        </td>
                        
                    </tr>
                    <?php $no++; }?>
                </tbody>
            </table>

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
