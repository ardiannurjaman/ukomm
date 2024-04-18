<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1f1f1f;">
    <div class="container">
    <a class="navbar-brand" href="index.php"><i class="fa-brands fa-envira"></i>  Galeri Foto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarNav">
            <div class="navbar-nav me-auto">

            </div>
            <a href="register.php" class="btn btn-primary m-1">
                <i class="fas fa-user-plus me-1"></i> Daftar
            </a>
            <a href="login.php" class="btn btn-success m-1">
                <i class="fas fa-sign-in-alt me-1"></i> Login
            </a>

        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <div class="card-body" style="background-color: #fff0f0;">
                    <div class="text-center">
                        <h5 class="card-title" style="color: #b30000;">Selamat Datang</h5>
                    </div>
                    <form action="config/aksi_login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn" type="submit" name="kirim" style="background-color: #b30000; color: white;">Masuk</button>
                        </div>
                    </form>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="register.php" style="color: #b30000;">Daftar disini!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>



<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; Projects Galery | Ardian Nurjaman</p>
</footer>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>