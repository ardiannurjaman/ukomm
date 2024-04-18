<?php
session_start();
include('./config/koneksi.php');
?>

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


<div class="container mt-2">
    <div class="row">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="col-md-3">
                <div class="card mb-2 position-relative">
                    <img src="assets/img/<?php echo $data['lokasifile'] ?>" alt="<?php echo $data['judulfoto'] ?>" class="card-img-top" style="height: 12rem;">
                    <div class="card-footer text-center overlay">
                        <!-- Like Icon -->
                        <a href="#" name="suka" class="text-blue"><i class="fa-regular fa-heart"></i></a>
                        <?php
                        $fotoid = $data['fotoid'];
                        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo '<span class="text-blue">' . mysqli_num_rows($like) . ' Suka</span>';
                        ?>

                        <!-- Comment Icon -->
                        <a href="#" class="text-blue"><i class="fa-regular fa-comment"></i></a>
                        <?php
                        // Menghitung jumlah komentar untuk foto ini
                        $komentar_query = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                        echo '<span class="text-blue">' . mysqli_num_rows($komentar_query) . ' Komentar</span>';
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; Projects Galery | Ardian Nurjaman</p>
    </footer>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>