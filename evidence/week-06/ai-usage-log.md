
## Catatan Penggunaan AI

Pada Pertemuan 6, AI (DeepSeek) digunakan sebagai **reviewer** dan **tutor** untuk membantu memahami konsep — bukan untuk menggantikan pemahaman.

| No | Masalah/Tujuan | Saran AI | Keputusan | Hasil Uji |
|----|----------------|----------|-----------|-----------|
| 1 | Branching diskon | Pisahkan aturan ke `getDiscountPercent()` | Diterima | Mahasiswa 20%, guru 15%, umum 0% |
| 2 | Checkbox kosong | Gunakan `$_POST['interests'] ?? []` dan validasi array | Diterima | Tidak ada warning saat minat kosong |
| 3 | Looping | Render kursus/minat/fasilitas dari array dengan `foreach` | Diterima | Data baru muncul tanpa copy-paste markup |
| 4 | Format rupiah | Pakai `number_format()` untuk format Rupiah | Diterima | Rp 160.000 tampil benar |
| 5 | Tampilan tabel | Ubah `<dl>` jadi `<table>` dengan CSS soft | Diterima | Tabel lebih rapi & konsisten |

---

## Refleksi

**Apa yang saya pelajari dari AI:**
- Cara memisahkan logika diskon ke function (reusable)
- Cara handle checkbox kosong tanpa warning
- Cara render data dari array pakai `foreach`
- Cara format Rupiah dengan `number_format()`

**Apa yang saya kerjakan sendiri (tanpa AI):**
- Menulis kode form pendaftaran
- Menulis `process-registration.php` (logika diskon, subtotal)
- Menyusun struktur HTML & CSS
- Test 12 skenario di browser
- Screenshot evidence

**Kesimpulan:**
AI membantu **memahami konsep**, tapi **kode tetap saya tulis sendiri** dan saya **bisa menjelaskan** setiap bagian.
