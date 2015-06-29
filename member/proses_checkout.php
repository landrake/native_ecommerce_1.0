<?php
    include "../koneksi.php";
    

    // ambil data session data user dan inputan dari checkout.php
    session_start();
    $id_user    = $_SESSION['id_user'];
    $nm_pnrm    = $_POST['nm_pnrm'];
    $almt_pnrm  = $_POST['almt_pnrm'];
    $tlp_pnrm   = $_POST['tlp_pnrm'];

    $query_user = "SELECT
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
                    WHERE user.id_user = '".$_SESSION['id_user']."'";
    $sql_user   = mysql_query($query_user);
    while ($data= mysql_fetch_array($sql_user)) {
        $user = $data['username'];
    }

    // ambil data dari tabel keranjang_sementara
    $grandtotal = 0;
    $query_keranjang  = " SELECT
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
                barang_detail.ringkasan_detail_barang,
                keranjang_sementara.id_keranjang,
                keranjang_sementara.id_barang,
                keranjang_sementara.jumlah_beli,
                keranjang_sementara.id_user
                FROM
                barang_detail
                INNER JOIN barang ON barang_detail.id_barang = barang.id_barang
                INNER JOIN keranjang_sementara ON keranjang_sementara.id_barang = barang.id_barang
                WHERE keranjang_sementara.id_user = '".$_SESSION['id_user']."' ";

    $sql_keranjang         = mysql_query($query_keranjang);

    while($data = mysql_fetch_array($sql_keranjang)){
        $kd_brg         = $data['kode_barang'];
        $nm_brg         = $data['nama_barang'];
        $jml_brg        = $data['jumlah_beli'];
        $hrg_brg        = $data['harga'];
        $total          = $jml_brg*$hrg_brg;
        $grandtotal     += $total;
        $biaya          = '10000';
        $tgl_kirim      = date('Y-m-d');
        $id_brg_coy     = $data['id_barang'];
        $jumlah_coy     = $data['jumlah'];

    }

    // echo $grandtotal;
    $totalsemua = $grandtotal+$biaya;
    // echo $totalsemua;
    function generateRandomString($length = 2) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

    $gen = generateRandomString();
    $no_pemesanan = 'AKS/'.$_SESSION['id_user'].'/'.date('ymd').'-'.$gen;
    $sql_order  ="INSERT INTO  `ecom_haris`.`order` (
                `id_order`,
                `id_user` ,
                `total_harga` ,
                `status` ,
                `tgl_order` ,
                `tgl_kirim` ,
                `tgl_terima` ,
                `nama_penerima` ,
                `alamat_penerima` ,
                `tlp_penerima` ,
                `no_pemesanan`
                )
                VALUES (
                NULL ,  '$id_user',  '$totalsemua',  '1', '$tgl_kirim', '', '', '$nm_pnrm', '$almt_pnrm', '$tlp_pnrm', '$no_pemesanan' 
                )";
    // echo $sql_order;
    if(mysql_query($sql_order,$koneksi)){
        $last_id_order = mysql_insert_id($koneksi);

        $$grandtotal = 0;
        $query_keranjang  = " SELECT
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
                    barang_detail.ringkasan_detail_barang,
                    keranjang_sementara.id_keranjang,
                    keranjang_sementara.id_barang,
                    keranjang_sementara.jumlah_beli,
                    keranjang_sementara.id_user
                    FROM
                    barang_detail
                    INNER JOIN barang ON barang_detail.id_barang = barang.id_barang
                    INNER JOIN keranjang_sementara ON keranjang_sementara.id_barang = barang.id_barang
                    WHERE keranjang_sementara.id_user = '$id_user' ";

        $sql_keranjang1        = mysql_query($query_keranjang);
        $rows = array();
        while($data=mysql_fetch_array($sql_keranjang1))
            $rows [] = $data;
        foreach ($rows as $row) {
            $id_barang = stripslashes($row['id_barang']);
            $jml_order = stripslashes($row['jumlah_beli']);
            $hrg       = stripslashes($row['harga']);
            $jml_harga = $jml_order*$hrg;
            $catatan   = ''; 

            $sql_insert_order_det = " INSERT INTO order_detail (id_order_detail, id_order, id_barang, jumlah_order, jumlah_harga, catatan)
                                    VALUES (NULL, '$last_id_order', '$id_barang', '$jml_order', '$jml_harga', '$catatan')
                                    ";
            mysql_query($sql_insert_order_det);
            $hasil_coy  = $jumlah_coy-$jml_order;
            $sql_update = " UPDATE `barang_detail` SET `jumlah` = '$hasil_coy' WHERE `id_barang` = '$id_barang'";
            mysql_query($sql_update);
        }
    }

    $sql_delete = " DELETE FROM `keranjang_sementara` WHERE `id_user` = '".$_SESSION['id_user']."' ";
    mysql_query($sql_delete,$koneksi);
    echo "<script>window.location='invoice.php?id_order=".$last_id_order."';</script>";
?>