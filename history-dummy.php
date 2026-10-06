<?php
// Data dummy pendaftaran (simulasi)
$history = [
    ['name' => 'Andi Pratama', 'course' => 'PHP Dasar', 'type' => 'Mahasiswa', 'date' => '2026-09-25', 'total' => 250000],
    ['name' => 'Budi Santoso', 'course' => 'Laravel Fundamental', 'type' => 'Guru', 'date' => '2026-09-26', 'total' => 425000],
    ['name' => 'Citra Dewi', 'course' => 'Web Dasar', 'type' => 'Umum', 'date' => '2026-09-27', 'total' => 200000],
    ['name' => 'Dedi Kurniawan', 'course' => 'PHP Dasar', 'type' => 'Mahasiswa', 'date' => '2026-09-28', 'total' => 200000],
];

function e($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>History Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container">
  <section class="page-intro">
    <p class="eyebrow">History Dummy</p>
    <h1>Riwayat Pendaftaran (Data Contoh)</h1>
    <p>Data di bawah ini adalah simulasi. Belum tersimpan di database.</p>
  </section>

  <section class="summary-card">
    <table class="cost-table">
      <thead>
        <tr>
          <th class="col-no">No</th>
          <th>Nama</th>
          <th>Kursus</th>
          <th>Tipe</th>
          <th>Tanggal</th>
          <th class="col-total">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($history as $i => $item): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= e($item['name']) ?></td>
            <td><?= e($item['course']) ?></td>
            <td><?= e($item['type']) ?></td>
            <td><?= e($item['date']) ?></td>
            <td>Rp <?= number_format($item['total'], 0, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a class="btn-link" href="registration.php">Kembali ke Form</a>
  </section>
</main>
</body>
</html>