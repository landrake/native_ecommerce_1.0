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
    
        <form class="form-signin" action="ceklogin_admin.php" method="post">
            <h2 class="form-signin-heading">Harap Login</h2>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="username" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
            <a class="btn btn-lg btn-warning btn-block" href="index.php">Kembali Ke Beranda</a>
        </form>

    </div> <!-- /container -->
</body>
</html>