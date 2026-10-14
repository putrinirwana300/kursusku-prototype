<?php

// ===== OUTPUT ESCAPE =====
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// ===== FORMAT UANG =====
function rupiah(int $amount): string {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function formatRupiah(int $amount): string {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

// ===== FORMAT TANGGAL =====
function formatTanggal(string $date): string {
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}

// ===== PENCARIAN KURSUS =====
function findCourse(array $courses, string $code): ?array {
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }
    return null;
}

// ===== DISKON =====
function getDiscountPercent(string $participantType): int {
    if ($participantType === 'mahasiswa') {
        return 20;
    } elseif ($participantType === 'guru') {
        return 15;
    }
    return 0;
}

// ===== LABEL METODE BELAJAR (switch) =====
function getLearningModeLabel(string $mode): string {
    switch ($mode) {
        case 'offline': return 'Tatap Muka';
        case 'online':  return 'Online';
        case 'hybrid':  return 'Hybrid';
        default:        return 'Tidak diketahui';
    }
}

// ===== STATUS KURSUS =====
function statusKursus(int $quota, int $registered): string {
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

function sisaKursi(int $quota, int $registered): int {
    return max(0, $quota - $registered);
}