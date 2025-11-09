# 🏛️ Sistem Informasi Pembuatan Surat Desa (SIPS)

Aplikasi **Sistem Informasi Pembuatan Surat Desa** adalah platform berbasis web untuk mengelola pembuatan surat masuk dan surat keluar di lingkungan pemerintahan desa.

Aplikasi ini memudahkan warga dalam mengajukan surat secara online, dan memudahkan pihak desa dalam mengecek, memverifikasi, serta mencetak surat dengan cepat dan terstruktur.

---

## ✅ Fitur Utama

### 👤 Untuk Warga
- Registrasi dan Login
- Mengajukan pembuatan surat secara online
- Mengisi data sesuai formulir jenis surat
- Mengikuti proses surat hingga selesai
- Riwayat surat yang sudah pernah diajukan

### 🏛️ Untuk Admin / Operator Desa
- Melihat pengajuan surat dari warga
- Memproses dan melakukan verifikasi data surat
- Mencetak dan mengarsipkan surat
- Mengelola surat keluar

---

## 📑 Jenis Surat yang Dapat Dibuat

- Surat Keterangan Tidak Mampu *(SKTM)*
- Surat Keterangan Domisili
- Surat Keterangan Pindah Penduduk

> Jenis surat dapat dikembangkan sesuai kebutuhan desa.

---

## 🔄 Alur Pembuatan Surat (User Flow)

1. Login menggunakan akun yang sudah terdaftar
2. Jika belum terdaftar, lakukan registrasi terlebih dahulu
3. Pilih menu **Pengajuan Surat**
4. Pilih jenis surat yang akan dibuat
5. Isi formulir sesuai data diri
6. Submit permohonan surat
7. Admin akan memproses dan memverifikasi
8. Jika sudah selesai, surat dapat dilihat pada menu **Surat Keluar / Riwayat Surat**

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
|----------|-----------|
| Backend | Laravel Framework |
| Frontend | Blade Template + Bootstrap |
| Database | MySQL / MariaDB |

---

## 🚀 Instalasi

```bash
# Clone repository
git clone <url-repo>

# Masuk folder project
cd <nama-folder>

# Install dependencies Laravel
composer install

# Copy file environment
cp .env.example .env

# Generate key
php artisan key:generate

# Atur database di file .env kemudian jalankan migrasi
php artisan migrate --seed

# Jalankan server
php artisan serve
```

Aplikasi dapat diakses melalui:

```
http://localhost:8000
```

---

## 👥 Hak Akses

| Role | Keterangan |
|------|------------|
| Warga / User | Mengajukan surat dan melihat status surat |
| Admin / Operator Desa | Memproses, mencetak, dan mengelola surat |

---

## 📄 Lisensi

Aplikasi ini bersifat **open-source** dan bebas dikembangkan sesuai kebutuhan desa atau instansi lain.

---

Jika aplikasi ini bermanfaat, jangan lupa ⭐ repository ini di GitHub!
