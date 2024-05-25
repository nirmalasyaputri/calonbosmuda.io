<?php 
session_start();
//jika bisa login maka ke index.php
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

//memanggil atau membutuhkan file function.php
require 'function.php';

//jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //password menggunakan md5

    //mengambil data
    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $_SESSION['login'] = true;

        header('location:index.php');
        exit;
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own css -->
    <link rel="stylesheet" href="css/syle.css">

    <title>Login</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">DATA SMKN 1 PETIR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    <!-- close navbar -->

    <div class="container" style="margin-left: 50px; width: 60%; margin-top: 80px;">
        <div class="row my-5">
            <div class="col-md-6 text-center login" style="background-image: url('img/tampilan.jpg'); width: 350px; height: 400px; border-radius: 10px; background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
                <h4 class="fw-bold" style=" margin-top: 40px; padding-top: 40px;">Login | Admin</h4>
                <!-- ini error jika tidak bisa login -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password Salah!");</script>';?>
                <?php endif; ?>
                <form action="" method="post" style="margin-top: 20px; margin-left: -120px; margin-right: -120px;">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" required style="height: 50px; width: 400px; border-radius: 10px;">
                    </div>
                    <div class="form-group user">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required style="height: 50px; margin-top: 20px; width: 400px;  border-radius: 10px;">
                    </div>

                    <button class="btn btn-primary text-uppercase" type="submit" name="login" style="margin-top: 40px;  border-radius: 5px; ">Login</button>
                    <br>
                </form>
            </div>
        </div>
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>