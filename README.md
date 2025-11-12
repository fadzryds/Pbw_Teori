# 📰 Aplikasi Berita Laravel dan Admin Filament

Aplikasi ini merupakan sistem berita sederhana menggunakan **Laravel**, dengan fitur:
- Relasi Wartawan dan Komentar
- Tampilan Gambar Otomatis di Index dan Detail
- Membuat CRUD untuk mengelola berita menggunakan admin

---

## 📁 Struktur Proyek

```
app/
├── Models/
│   ├── News.php
│   ├── Wartawan.php
│   └── Komentar.php
├── Http/
│   └── Controllers/
│       ├── NewsController.php
│       ├── KomentarController.php
│       └── WartawanController.php
resources/
└── views/
    ├── news/
    │   ├── index.blade.php
    │   └── show.blade.php
```

---

## 🧩 Cuplikan Kode

### 🗂️ Model News
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/011a4f00-4a31-49d8-a2a7-a66a87669627" />

### 🗂️ Controller NewsController
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/18ac6f83-c9a9-4d8c-81b8-80fcede416c8" />

### 💬 Controller KomentarController
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/39b5f9c3-7d03-4c99-a33b-25e9a16cdd3c" />

---

## 🎨 Tampilan Halaman

### 🏠 Halaman Index (Daftar Berita)
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/e88070a1-4e22-45e8-be50-436f207ccb2d" />

### 📰 Halaman Detail Berita
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/9f622ea0-a78d-4897-a46f-8ab50dc7b97a" />

### 📰 Halaman Detail Pada bagian komen Berita
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/0fd0bea6-1608-43d6-8d76-df5b7322cab2" />

---

## 💾 Fitur Upload Gambar

- Gambar disimpan otomatis di `storage/app/public/news`
- Ditampilkan di halaman index dan show
- Bisa diakses menggunakan `asset('storage/'.$berita->gambar)`

---
## 🧑‍💼 Admin Panel Menggunakan Filament

Aplikasi ini juga dilengkapi **panel admin** menggunakan **Filament**, yang berfungsi untuk mengelola seluruh data berita, wartawan, dan komentar dengan tampilan yang modern dan responsif.

### ⚙️ Instalasi Filament

Jalankan perintah berikut di terminal:

composer require filament/filament:"^3.0"
Kemudian buat user admin:

```bash
Salin kode
php artisan make:filament-user
Isi data seperti nama, username, dan password untuk login ke panel admin.
```
🗂️ Resource yang Digunakan di Admin
WartawanResource

- CRUD untuk data wartawan (nama, email, jabatan).

- Menjadi relasi utama pada tabel berita.

NewsResource

- CRUD untuk berita.
- Relasi ke wartawan untuk menampilkan nama penulis.
- Tersedia form editor teks isi berita.

KomentarResource

- CRUD untuk komentar pembaca.

- Relasi dengan berita (setiap komentar terkait satu berita).

- Menampilkan nama pengirim dan isi komentar.

🌐 Akses Panel Admin
Setelah menjalankan server:

```bash
Salin kode
php artisan serve
Akses halaman admin di browser:
```
```arduino
Salin kode
http://127.0.0.1:8000/admin
Login menggunakan akun yang sudah dibuat melalui perintah php artisan make:filament-user.
```
🧭 Fitur Panel Admin
Tampilan CRUD otomatis dari setiap resource (Wartawan, News, Komentar)

Fitur pencarian, filter, dan pagination otomatis

Upload gambar berita langsung dari form admin

Relasi wartawan & komentar tampil otomatis di form input

Tampilan clean dan responsif di desktop maupun mobile

📸 Tampilan Panel Admin Filament
🧾 Daftar Berita (News Resource)
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/d18ca12f-4711-4cc1-bd20-c990d961d5f7" />
🧍 Data Wartawan (Wartawan Resource)
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/aaf52776-5a99-4235-86c9-b351c0365ea7" />
💬 Data Komentar (Komentar Resource)
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/3916cbf2-cae7-4f72-9c81-0897431043ca" />
---
## ⚙️ Menambahkan Gambar ke Berita Lama (via Tinker)

```bash
php artisan tinker
>>> $berita = App\Models\News::find(1);
>>> $berita->gambar = 'news/gambar1.jpg';
>>> $berita->save();
```

## 👤 Dibuat Oleh
**Nama:** Fadzry Dewa Sya'bana
**NPM:** 4523210043
**Kelas / Prodi:** PBW A / Teknik Informatika  
**Framework:** Laravel 12  
**Database:** MySQL  
**Storage:** Public Storage Laravel
