<?php
include 'koneksi.php';

// Validasi & amankan input ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id' LIMIT 1");
$produk = mysqli_fetch_assoc($data);

if (!$produk) {
  echo "<h2>Produk tidak ditemukan</h2>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= htmlspecialchars($produk['nama']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">← Kembali ke Katalog</a>
  </div>
</nav>

<!-- Detail Produk -->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <img src="images/<?= $produk['gambar'] ?>" class="img-fluid rounded shadow-sm" alt="<?= htmlspecialchars($produk['nama']) ?>">
    </div>
    <div class="col-md-6">
      <h2 class="fw-bold"><?= htmlspecialchars($produk['nama']) ?></h2>
      <p class="fs-5 text-primary">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
      <p><?= nl2br(htmlspecialchars($produk['deskripsi'])) ?></p>
      <a href="index.php" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center bg-dark text-white mt-5 py-3">
  <p class="mb-0">© <?= date('Y') ?> MyStore. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
