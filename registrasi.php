<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/images/favicon.png" sizes="16x16" type="image/png">
    <title>Aksclutor</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/login-style.css" rel="stylesheet">

</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><strong><h3>Form Registrasi</h3></strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="proses_regis_member.php" enctype="multipart/form-data">
                        <div class="form-group form-group-sm" >
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Username</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Tulis Username Anda" name="usrn">
                            </div><br><br>
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" id="formGroupInputSmall" placeholder="Tulis Password Anda" name="pass">
                            </div><br><br>
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Nama Depan</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Tulis Nama Depan Anda" name="nm_dpn">
                            </div><br><br>
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Tulis Nama Belakang Anda" name="nm_blkg">
                            </div><br><br>
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" type="text" name="almt" placeholder="Tulis Alamat Anda" style="height:100px;margin-bottom:10px;"></textarea>
                            </div>
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Telepon</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Tulis Nomor Telepon Anda" name="tlp" style="margin-bottom:10px;">
                            </div>
                            <label class="col-sm-4 control-label" for="formGroupInputSmall" style="text-align:left;">Email</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Tulis Email Anda" name="email" style="margin-bottom:10px;">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-lg btn-success btn-block" type="submit" style="width:200px;text-align:center">Daftar !</button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-lg btn-danger btn-block" type="reset" style="width:200px;text-align:center">Hapus !</button>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-lg btn-info btn-block" href="index.php" style="width:200px;text-align:center">Kembali Ke Beranda</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div> <!-- /container -->
</body>
</html>