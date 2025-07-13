<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Katalog Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyStore</a>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
  <h1 class="text-center mb-4 fw-bold text-primary">Katalog Produk</h1>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow border-0 hover-card">
        <img src="images/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nama']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
          <p class="card-text text-muted" style="min-height: 48px;">
            <?= isset($row['deskripsi']) ? substr(htmlspecialchars($row['deskripsi']), 0, 80) . '...' : '<em>Deskripsi belum tersedia</em>' ?>
          </p>
          <p class="card-text"><strong>Rp<?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
          <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-primary w-100">Lihat Detail</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Footer -->
<footer class="text-center bg-dark text-white mt-5 py-3">
  <p class="mb-0">© <?= date('Y') ?> MyStore. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
