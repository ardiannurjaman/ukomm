<?php
session_start();
include('../config/koneksi.php');
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum Login');
    location.href='../index.php';
    </script>";
}

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1f1f1f;">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="fa-brands fa-envira"></i>  Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php">Foto</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <a href="../config/aksi_logout.php" class="btn btn-danger">
          <i class="fas fa-sign-out-alt me-1"></i> Logout
        </a>
      </div>
    </div>
  </div>
</nav>


<div class="container mt-3">
    <h3>Album :</h3>
    <?php
    $album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
    while($row = mysqli_fetch_array($album)){ ?>
    <a href="home.php?albumid=<?php echo $row['albumid']?>" class="btn btn-secondary"><?php echo $row['namaalbum']?></a>

    <?php } ?>

    <div class="row">
        <?php 
        if (isset($_GET['albumid'])){
            $albumid = $_GET['albumid'];
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
        while($data = mysqli_fetch_array($query)){ ?>

        <div class="col-md-3 mt-2">
            <div class="card">
                <img src="../assets/img/<?php echo $data['lokasifile'] ?>" alt="" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                <div class="card-footer text-center">
                   
                    <?php
                        $fotoid = $data['fotoid'];
                        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'AND userid='$userid'");
                        if (mysqli_num_rows($ceksuka) == 1){ ?>
                             <a href="#" type="submit" name="batalsuka"><i class="fa-solid fa-heart"></i></a>
                       <?php }else{ ?>
                        <a href="#" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>

                        <?php }

                        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($like). 'Suka';
                    ?>
                   <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>"><i class="fa-regular fa-comment"></i></a>
                    <?php 
                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($jmlkomen).' komentar';
                    ?>
                </div>
            </div>
        </div>

        <?php } }else{ 

$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
while($data = mysqli_fetch_array($query)){
?>
<div class="col-md-3 mt-2">
            <div class="card">
                <img src="../assets/img/<?php echo $data['lokasifile'] ?>" alt="" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
                <div class="card-footer text-center">
                   
                    <?php
                        $fotoid = $data['fotoid'];
                        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'AND userid='$userid'");
                        if (mysqli_num_rows($ceksuka) == 1){ ?>
                             <a href="#" type="submit" name="batalsuka"><i class="fa-solid fa-heart"></i></a>
                       <?php }else{ ?>
                        <a href="#" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>

                        <?php } 

                        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($like). 'Suka';
                    ?>
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>"><i class="fa-regular fa-comment"></i></a>
                    <?php 
                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                    echo mysqli_num_rows($jmlkomen).' komentar';
                    ?>
                </div>
            </div>
            
        </div>
<?php } } ?>
</div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; Projects Galery | Ardian Nurjaman</p>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>