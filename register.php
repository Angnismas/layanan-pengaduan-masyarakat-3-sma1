<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration Page - Layanan Pengaduan Masyarakat</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient" style="background-color: pink;"> 

    <div class="container">
    <div class="row justify-content-center">

<div class="col-xl-6">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Silahkan Buat Akun Kamu!</h1>
                                <small>Layanan Pengaduan Masyarakat</small>
                            </div>
                            <form class="user mt-3" action="" method="post">
                            <div class="form-group">
                                <input type="number" name="nik" id="nik" required placeholder="Masukkan NIK Anda" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama Anda" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" required placeholder="Masukkan Username Anda" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" required placeholder="Masukkan Password Anda" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <input type="number" name="telp" id="telp" required placeholder="Masukkan Nomer Telepon Anda" class="form-control form-control-user">
                            </div>
                            <button type="submit" name="daftar" class="btn btn-user btn-primary btn-block">
                                Daftar
                            </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                Kamu Sudah Punya Akun ? <a href="login.php">Klik Disini Ya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
if(isset($_POST['daftar'])){
    $nik = htmlspecialchars($_POST['nik']);
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $telp = htmlspecialchars($_POST['telp']);

    include 'koneksi.php';

    $cek = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE nik='$nik' OR username='$username'");
    if(mysqli_num_rows($cek)>0){
        ?>
        <script>
            alert('NIK/Username Sudah Terdaftar');
        </script>
        <?php
    }else{
        $register = mysqli_query($koneksi,"INSERT INTO masyarakat VALUES('$nik','$nama','$username','$password','$telp')");
        if($register){
            ?>
            <script>
                alert('Registrasi Berhasil, Silahkan Login dan Adukan Keluhan Anda');
                window.location.assign('login.php');
            </script>
            <?php
        }
    }
}