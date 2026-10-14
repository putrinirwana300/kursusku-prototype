<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kursus - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">KursusKu</a>
    <nav aria-label="Navigasi utama">
      <a href="index.php">Beranda</a>
      <a href="index.php#kursus">Katalog</a>
      <a href="register.php">Daftar</a>
      <a href="history.php">History</a>
    </nav>
  </div>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Pendaftaran Kursus</p>
    <h1>Mulai belajar bersama KursusKu</h1>
    <p>Gunakan data latihan. Field bertanda wajib harus diisi.</p>
  </section>

  <section class="form-card">
    <form method="POST" action="process.php" class="registration-form">

      <!-- Nama & Email -->
      <div class="form-grid">
        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input id="name" name="name" type="text" minlength="3" maxlength="100" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" maxlength="120" required>
        </div>
      </div>

      <!-- Pilih Kursus (dari array) -->
      <div class="form-group">
        <label for="course_code">Pilih Kursus</label>
        <select id="course_code" name="course_code" required>
          <option value="">-- Pilih kursus --</option>
          <?php foreach ($courses as $course): ?>
            <option value="<?= e($course['code']) ?>">
              <?= e($course['name']) ?> - <?= formatRupiah($course['fee']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Tipe Peserta (Radio) -->
      <fieldset class="form-group">
        <legend>Tipe Peserta</legend>
        <label class="choice">
          <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa
        </label>
        <label class="choice">
          <input type="radio" name="participant_type" value="guru"> Guru
        </label>
        <label class="choice">
          <input type="radio" name="participant_type" value="umum"> Umum
        </label>
      </fieldset>

      <!-- Minat Belajar (Checkbox dari array) -->
      <fieldset class="form-group">
        <legend>Minat Belajar</legend>
        <?php foreach ($interestOptions as $value => $label): ?>
          <label class="choice">
            <input type="checkbox" name="interests[]" value="<?= e($value) ?>">
            <?= e($label) ?>
          </label>
        <?php endforeach; ?>
      </fieldset>

      <!-- Metode & Jumlah Paket -->
      <div class="form-grid">
        <div class="form-group">
          <label for="learning_mode">Metode Belajar</label>
          <select id="learning_mode" name="learning_mode" required>
            <option value="">-- Pilih metode --</option>
            <option value="offline">Tatap Muka</option>
            <option value="online">Online</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </div>
        <div class="form-group">
          <label for="package_count">Jumlah Paket</label>
          <select id="package_count" name="package_count" required>
            <?php for ($i = 1; $i <= 3; $i++): ?>
              <option value="<?= $i ?>"><?= $i ?> paket</option>
            <?php endfor; ?>
          </select>
        </div>
      </div>

      <!-- Catatan -->
      <div class="form-group">
        <label for="notes">Catatan Tambahan</label>
        <textarea id="notes" name="notes" rows="4" maxlength="300" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
        <small class="help">Maksimal 300 karakter.</small>
      </div>

      <!-- Tombol -->
      <div class="action-buttons">
        <button class="btn-primary" type="submit">Proses Pendaftaran</button>
        <a href="history.php" class="btn-link">History Dummy</a>
        <a href="loop-lab.php" class="btn-link">Loop Lab</a>
      </div>

    </form>
  </section>
</main>
</body>
</html>