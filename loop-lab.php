<?php
function e($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$courses = [
    ['name' => 'Web Dasar', 'fee' => 300000],
    ['name' => 'PHP Dasar', 'fee' => 350000],
    ['name' => 'Laravel Fundamental', 'fee' => 500000],
];
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
<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Loop Lab</p>
    <h1>Latihan Perulangan PHP</h1>
    <p>Contoh loop `for` dan `foreach` untuk menampilkan data berulang.</p>
  </section>

  <!-- Contoh 1: Loop For -->
  <section class="summary-card">
    <h2>1. Loop For — Daftar Paket</h2>
    <ul>
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <li>Paket <?= $i ?>: Rp <?= number_format($i * 100000, 0, ',', '.') ?></li>
      <?php endfor; ?>
    </ul>
  </section>

  <!-- Contoh 2: Loop Foreach -->
  <section class="summary-card">
    <h2>2. Loop Foreach — Daftar Kursus</h2>
    <ol>
      <?php foreach ($courses as $course): ?>
        <li>
          <strong><?= e($course['name']) ?></strong> —
          Rp <?= number_format($course['fee'], 0, ',', '.') ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </section>

  <!-- Contoh 3: Loop + Kondisi -->
  <section class="summary-card">
    <h2>3. Loop + Kondisi — Diskon 15%</h2>
    <table class="cost-table">
      <thead>
        <tr><th>Kursus</th><th>Harga</th><th>Diskon</th><th>Total</th></tr>
      </thead>
      <tbody>
        <?php foreach ($courses as $course): 
          $discount = $course['fee'] * 0.15;
          $total = $course['fee'] - $discount;
        ?>
          <tr>
            <td><?= e($course['name']) ?></td>
            <td>Rp <?= number_format($course['fee'], 0, ',', '.') ?></td>
            <td>-Rp <?= number_format($discount, 0, ',', '.') ?></td>
            <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <div class="action-buttons">
    <a class="btn-link" href="registration.php">Kembali ke Form</a>
  </div>
</main>
</body>
</html>