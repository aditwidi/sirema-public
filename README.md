# PROJECT REKAYASA PERANGKAT LUNAK

<div align="center">
      <img src="/assets/img/logo.png" alt="Logo" width="305" height="100">
</div>

### Kelompok 3 Kelas 3SI1
- Aditya Widiyanto Nugroho  (222111845)
- Akma Batrisyia Jazima	    (222111871)
- I Made Yoga Andika Putra  (222112102)
- Irsyad Fadhil Asyraf      (222112116)
- Jihan Maisaroh            (222112122)
- Luthfiani Nur Aisyah      (222112162)
- Samuel Maruba Manik       (222112348)
- Yoga Pratama              (222112419)

## DESKRIPSI WEB SIREMA
SIREMA dibangun untuk memudahkan pengelolaan permintaan jasa yang disediakan oleh UKM Media Kampus. Lewat web ini, klien akan dapat mengakses layanan yang mereka butuhkan dengan mudah. Dengan demikian, UKM Media Kampus akan dapat mengoptimalkan efisiensi operasional, dan meningkatkan reputasi mereka sebagai salah satu penyedia layanan jasa liputan, desain, edit video ataupun lainnya yang andal dan terpercaya di dalam kampus.

## KEBUTUHAN TEKNIS
### Back-end
* PHP
* Laravel 8
* mySQL (database)
### Front-end
* HTML
* CSS
* JavaScript
* Bootstrap

## INSTALASI
#### 1. Clone project 
```
git clone https://git.stis.ac.id/222111845/sirema.git
```
#### 2. Buat database “sirema_mk” di phpmyadmin
#### 3. Buka terminal
```
php artisan migrate
php artisan db:seed
php artisan serve
```

## FITUR
* Landing page
* Registrasi akun
* Login
* Login with google
* Lupa password
* Logout
* Dashboard
* Notifikasi
* Shortcut
* Kalender
### User
* Manajemen request
    - Ajukan request
    - List request
    - Detail request
    - Edit request
    - Export list request
    - Delete request
### Personel
* Manajemen request
    - List request
    - Konfirmasi request
    - Detail request
    - Export list request
* Manajemen project
    - List project
    - Update progress project
    - Detail project
    - Export list project
### Admin
* Manajemen user
    - List user
    - Tambah user
    - Edit role user
    - Export list user
* Manajemen request
    - Ajukan request
    - List request
    - Detail request
    - Edit request
    - Terima/tolak request
    - Export list request
    - Delete request

## STRUKTUR KODE
### Model
Komponen ini terletak pada ```app/Models```. Komponen Model dalam arsitektur MVC merepresentasikan data yang digunakan pada aplikasi. Model akan bertindak sebagai sumber data dan status yang dapat di-query oleh View. Model tidak memiliki referensi langsung ke View, namun dapat mengirimnya ke Controller saat data berubah yang kemudian menginstruksikan View untuk memperbarui tampilannya. Hubungan antara Model dengan View ini disebut dengan **State Query**.
### View
Komponen ini terletak pada ```resources/views```. Komponen View bertanggung jawab dengan bagaimana data dapat ditampilkan kepada pengguna. Komponen ini akan mengambil data dari model dan memiliki beberapa logika tampilan untuk menentukan bagaimana data harus ditampilkan seperti menampilkan dashboard akan berbeda untuk ketiga role serta data yang akan ditampilkan berbeda juga. View merupakan bagian yang dapat diintegrasikan oleh pengguna nantinya seperti mengisi form, melakukan filter terhadap data, dan sebagainya.
### Controller
Komponen ini terletak pada ```app/Http/Controllers```. Komponen Controller bertindak sebagai perantara antara View dan Model. Controller akan menerima input dari pengguna melalui komponen View kemudian mengambil tindakan yang diperlukan berdasarkan input tersebut. Hubungan antara View dan Controller tersebut disebut **View Control**. Dalam memproses suatu input atau aksi dari pengguna, Controller akan memberi tahu model terkait perubahan yang terjadi. Hubungan antara Controller dengan Model disebut dengan **State Change**.
### Route
Komponen ini terletak pada ```app/routes/web```. Komponen Route mengatur rute pada aplikasi atau memetakan kemana proses akan dibawa. Route dapat menangani berbagai jenis HTTP request.
### Middleware
Komponen ini terletak pada ```app/Http/Middleware```. Komponen ini akan memfilter HTTP request. Contoh penggunannya adalah untuk memfilter bahwa suatu request hanya dapat dilakukan oleh pengguna yang terotentikasi. 