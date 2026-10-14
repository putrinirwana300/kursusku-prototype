<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loop Lab - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">KursusKu</a>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="register.php">Daftar</a>
      <a href="history.php">History</a>
    </nav>
  </div>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Loop Lab</p>
    <h1>Latihan Perulangan PHP</h1>
    <p>Contoh <code>for</code>, <code>while</code>, <code>do-while</code>, dan <code>foreach</code>.</p>
  </section>

  <!-- 1. FOR -->
  <section class="summary-card">
    <h2>1. Loop <code>for</code> — Pertemuan 1-5</h2>
    <ul>
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <li>Pertemuan ke-<?= $i ?></li>
      <?php endfor; ?>
    </ul>
  </section>

  <!-- 2. WHILE -->
  <section class="summary-card">
    <h2>2. Loop <code>while</code> — Nomor Antrean</h2>
    <ul>
      <?php
      $i = 1;
      while ($i <= 5):
      ?>
        <li>Nomor antrean: <?= $i ?></li>
      <?php
        $i++;
      endwhile;
      ?>
    </ul>
  </section>

  <!-- 3. DO-WHILE -->
  <section class="summary-card">
    <h2>3. Loop <code>do-while</code> — Percobaan</h2>
    <ul>
      <?php
      $i = 1;
      do {
      ?>
        <li>Percobaan ke-<?= $i ?></li>
      <?php
        $i++;
      } while ($i <= 5);
      ?>
    </ul>
  </section>

  <!-- 4. FOREACH — DARI data.php -->
  <section class="summary-card">
    <h2>4. Loop <code>foreach</code> — Daftar Kursus</h2>
    <p>Data dari <code>data.php</code>:</p>
    <ul>
      <?php foreach ($courses as $course): ?>
        <li>
          <strong><?= e($course['name']) ?></strong> —
          <?= formatRupiah($course['fee']) ?>
          (<?= e($course['code']) ?>)
        </li>
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- PERBANDINGAN -->
  <section class="summary-card">
    <h2>Perbandingan Loop</h2>
    <table class="cost-table">
      <thead>
        <tr><th>Loop</th><th>Karakter</th><th>Gunakan ketika</th></tr>
      </thead>
      <tbody>
        <tr><td><code>for</code></td><td>Counter jelas</td><td>Jumlah iterasi diketahui</td></tr>
        <tr><td><code>while</code></td><td>Kondisi dulu</td><td>Iterasi bergantung kondisi</td></tr>
        <tr><td><code>do-while</code></td><td>Blok dulu</td><td>Minimal jalan sekali</td></tr>
        <tr><td><code>foreach</code></td><td>Setiap item array</td><td>Memproses daftar data</td></tr>
      </tbody>
    </table>
  </section>

  <div class="action-buttons">
    <a class="btn-link" href="register.php">Kembali ke Form</a>
    <a class="btn-link" href="index.php">Beranda</a>
  </div>
</main>
</body>
</html>