<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

// Cek method — harus POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: register.php');
    exit;
}

// ===== AMBIL DATA POST =====
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$courseCode = $_POST['course_code'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$learningMode = $_POST['learning_mode'] ?? '';
$packageCount = (int) ($_POST['package_count'] ?? 1);
$notes = trim($_POST['notes'] ?? '');
$interests = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [];
}

// Filter minat hanya yang valid
$allowedInterestKeys = array_keys($interestOptions);
$interests = array_values(array_intersect($interests, $allowedInterestKeys));

// ===== VALIDASI =====
$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

$course = findCourse($courses, $courseCode);
if ($course == null) {
    $errors[] = 'Kursus tidak ditemukan.';
}

if (!in_array($participantType, ['mahasiswa', 'guru', 'umum'], true)) {
    $errors[] = 'Tipe peserta tidak valid.';
}

if (!in_array($learningMode, ['offline', 'online', 'hybrid'], true)) {
    $errors[] = 'Metode belajar tidak valid.';
}

if (!in_array($packageCount, [1, 2, 3], true)) {
    $errors[] = 'Jumlah paket tidak valid.';
}

// ===== TAMPILKAN ERROR (kalau ada) =====
if ($errors != []) {
    ?>
    <!doctype html>
    <html lang="id">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Data Belum Valid - KursusKu</title>
      <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="utility-page">
    <main class="utility-card">
      <h1>Data Belum Dapat Diproses</h1>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?= e($error) ?></li>
        <?php endforeach; ?>
      </ul>
      <a href="register.php" class="button">Kembali ke Form</a>
    </main>
    </body>
    </html>
    <?php
    exit;
}

// ===== HITUNG BIAYA =====
$discountPercent = getDiscountPercent($participantType);
$grossTotal = $course['fee'] * $packageCount;
$discountAmount = intdiv($grossTotal * $discountPercent, 100);
$finalTotal = $grossTotal - $discountAmount;

// Label metode
$learningModeLabel = getLearningModeLabel($learningMode);
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ringkasan Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">KursusKu</a>
    <nav aria-label="Navigasi utama">
      <a href="index.php">Beranda</a>
      <a href="register.php">Daftar</a>
      <a href="history.php">History</a>
    </nav>
  </div>
</header>

<main class="container">
  <section class="alert-success">
    <h1>Pendaftaran Berhasil Diproses</h1>
    <p>Periksa kembali data latihan berikut.</p>
  </section>

  <!-- ===== DATA PESERTA ===== -->
  <section class="summary-card">
    <h2>Data Peserta</h2>
    <table class="cost-table">
      <tbody>
        <tr><th>Nama</th><td><?= e($name) ?></td></tr>
        <tr><th>Email</th><td><?= e($email) ?></td></tr>
        <tr><th>Kursus</th><td><?= e($course['name']) ?></td></tr>
        <tr><th>Tipe Peserta</th><td><?= e($participantType) ?></td></tr>
        <tr><th>Metode</th><td><?= e($learningModeLabel) ?></td></tr>
        <tr><th>Jumlah Paket</th><td><?= $packageCount ?> paket</td></tr>
      </tbody>
    </table>
  </section>

  <!-- ===== RINCIAN BIAYA ===== -->
  <section class="summary-card">
    <h2>Rincian Biaya</h2>
    <table class="cost-table">
      <tbody>
        <tr><th>Biaya satuan</th><td><?= formatRupiah($course['fee']) ?></td></tr>
        <tr><th>Subtotal (<?= $packageCount ?> paket)</th><td><?= formatRupiah($grossTotal) ?></td></tr>
        <tr><th>Diskon <?= $discountPercent ?>%</th><td>-<?= formatRupiah($discountAmount) ?></td></tr>
        <tr class="total-row">
          <th>TOTAL AKHIR</th>
          <td><?= formatRupiah($finalTotal) ?></td>
        </tr>
      </tbody>
    </table>
  </section>

  <!-- ===== MINAT ===== -->
  <section class="summary-card">
    <h2>Minat</h2>
    <ul>
      <?php if ($interests == []): ?>
        <li>Belum memilih minat.</li>
      <?php else: ?>
        <?php foreach ($interests as $interest): ?>
          <?php $label = $interestOptions[$interest] ?? $interest; ?>
          <li><?= e($label) ?></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </section>

  <!-- ===== CATATAN ===== -->
  <?php if ($notes !== ''): ?>
    <section class="summary-card">
      <h2>Catatan</h2>
      <p><?= e($notes) ?></p>
    </section>
  <?php endif; ?>

  <!-- ===== TOMBOL ===== -->
  <div class="action-buttons">
    <a class="btn-link" href="register.php">Daftar Lagi</a>
    <a class="btn-link" href="index.php">Beranda</a>
  </div>
</main>
</body>
</html>