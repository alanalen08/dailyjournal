<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Daily Journal</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .hero-section {
        background-color: #eee5cb;
        padding: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .hero-text {
        max-width: 60%;
      }
      .profile-photo {
        object-fit: cover;
        width: 150px;
        height: 150px;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#home">My Daily Journal</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#article">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#jadwal">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#profile">Profile</a>
          </li>
          <li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
</li>
        </ul>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
      <div class="hero-text">
        <h1>JOURNAL MOUNTAIN PRAU ARIQ ARSALAN</h1>
        <p>Created by alanalen</p>
      </div>
        <img src="siluet.jpg" alt="Hero Image" width="200" height="300">
    </div>
    </section>

    <!-- Carousel Section -->
    <section id="carouselSection" class="my-5">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="gambar1.jpg"
              class="d-block w-75"
              alt="Slide 1"
            />
          </div>
          <div class="carousel-item">
            <img
              src="gambar2.jpg"
              class="d-block w-75"
              alt="Slide 2"
            />
          </div>
          <div class="carousel-item">
            <img
              src="gambar3.jpg"
              class="d-block w-75"
              alt="Slide 3"
            />
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>

    <!--Article Section-->
    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- gallery end -->
<section id="gallery" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">gallery</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>


    <!--Schedule Section-->
    <section id="jadwal" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-5">Jadwal Kuliah</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Senin</h5>
                            <p class="card-text">08:00 - 10:00 |Basis Data| Ruang H.4.4
                            <p class="card-text">10:30 - 12:30 |Dasar Pemrograman| Ruang H.4.11</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Selasa</h5>
                            <p class="card-text">08:00 - 10:00 |Pemrograman Web| Ruang H.4.4
                            <p class="card-text">10:30 - 12:30 |Basis Data| Ruang H.4.11</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Rabu</h5>
                            <p class="card-text">08:00 - 10:00 |Sistem Operasi| Ruang H.4.4
                            <p class="card-text">10:30 - 12:30 |Logika Informatika| Ruang H.4.11</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Kamis</h5>
                            <p class="card-text">08:00 - 10:00 |RPL| Ruang H.4.4
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumat</h5>
                            <p class="card-text">08:00 - 10:00 |PROBSTAT| Ruang H.4.4
                            <p class="card-text">10:30 - 12:30 |Kalkulus| Ruang H.4.11</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Sabtu</h5>
                            <p class="card-text">08:00 - 10:00 |Fisika| Ruang H.4.4
                            <p class="card-text">10:30 - 12:30 |MATVEK| Ruang H.4.11</p>
                        </div>
                    </div>
                </div>               <div class="col">
                    <div class="card schedule-card">
                        <div class="card-body">
                            <h5 class="card-title">Minggu</h5>
                            <p class="card-text">Tidak ada jadwal
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

<!--Profile Section-->
<section id="profile" class="profile-section container">
        <h2 class="text-center mb-5">Profil Saya</h2>
        <div class="row align-items-center">
          <div class="col-md-4 text-center mb-4 mb-md-0">
            <img
              src="alan1.jpg"
              alt="Foto Mahasiswa"
              class="rounded-circle"profile-photo img-fluid"
            />
          </div>
  
          <div class="col-md-8">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <th scope="row">Nama</th>
                  <td>Ariq Arsalan</td>
                </tr>
                <tr>
                  <th scope="row">NIM</th>
                  <td>A11.2023.15277</td>
                </tr>
                <tr>
                  <th scope="row">Program Studi</th>
                  <td>Teknik Informatika</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>ariqarsalan10@gmail.com</td>
                </tr>
                <tr>
                  <th scope="row">Telepon</th>
                  <td>085681327266</td>
                </tr>
                <tr>
                  <th scope="row">Alamat</th>
                  <td>kelurahan bulustulan semarang selatan</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <br />

      <footer class="h2 p-2 text-dark text-center">
        <div>
            ARIQ ARSALAN @ 2024
        </div>
    </footer>   

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>




