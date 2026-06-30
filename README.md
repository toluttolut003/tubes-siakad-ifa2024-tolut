Nama    : Tolut
NPM     : 5520124031
Kelas   : IFA24

# LINK WEBSITE :
https://tolut.ifalgorithm24.web.id/krs/create

# __Sistem Akademik SIAKAD__
### Deskripsi Singkat
Aplikasi ini memiliki fungsi sebagai tempat untuk me-menage data rencana studi mahasiswa, mulai dari me-menage matakuliah yang bisa di ambil, dosen yang bisa di assign ke matakuliah, jadwal, juga daftar mahasiswa.

Adapun fungsi untuk mahasiswa diantaranya seperti mengambil matakuliah (input KRS), melihat jadwal, juga melihat matakuliah yang diambil.

Akun hanya bisa di buat oleh admin melalui UserSeeder, mahasiswa yang ingin dibuatkan akun harus mempunyai npm yang terdaftar terlebih dahulu pada tab Mahasiswa.

### Daftar Page
#### 1. Login
pada page ini user bisa menginputkan akun yang terdaftar
list akun yang terdaftar :
#### Akun Admin
NPM: Admin
Password: Admin123 
#### Akun Mahasiswa (ada error untuk krs mhs pada website, tapi di localhost aman)
NPM : 5520124031
Password : Tolut123

NPM :   5520124022
Password : Ari123

![](/screenshots/Login.png)

#### 2. Dashboard
halaman utama ketika masuk ke aplikasi, berbeda antar role mahasiswa dan admin

![](/screenshots/dashboard.png)

#### 3. dosen
Di page ini Admin bisa menambahkan dosen baru, mengahapus atau memperbarui dosen yang ada.

![](/screenshots/dosen.png)
![](/screenshots/dosen,edit.png)

#### 4. Mahasiswa
Di page ini Admin bisa menambahkan daftar mahasiswa sebelum akun mereka bisa dibuat, admin juga bisa mengahapus data, tetapi jika mengahpus mahasiswa akan menghapus akun mahasiswa yang terhubung dengan npm yg di hapus.

![](/screenshots/mahasiswa.png)
![](/screenshots/mahasiswa.edit.png)

#### 5. Matakuliah
Di page ini Admin bisa menambah matakuliah baru beserta jumlah sks nya.

![](/screenshots/matakuliah.png)
![](/screenshots/matakuliah.edit.png)

#### 5. Jadwal
Di page ini Admin bisa menambahkan jadwal, mulai dari jam berapa matakuliah dimulai, siapa dosen nya, kelas apa dan matakuliah apa.
Mahasiswa bisa melihat bagian page ini

![](/screenshots/Jadwal.png)
![](/screenshots/jadwal.create.png)

#### 5. KRS (fitur utama)
fungsi krs tergantung role
jika admin, admin bisa menambahkan krs untuk mahasiswa mana saja yang terdaftar.
Jika mahasiswa, mahasiswa dapat megambil krs, di page ini juga mahasiswa dapat melihat krs apa saja yang diambil.
kedua role bisa menghapus list krs, tetapi mahasiswa hanya krs miliknya saja/yang di ambil.

![](/screenshots/krs.png)
![](/screenshots/dosen.create.png)

#####change
