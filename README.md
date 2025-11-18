# TP8DPBO2425C1

# Janji
Saya Rizka Aulia dengan NIM 2403245 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan

# Desain
Program ini dirancang menggunakan arsitektur MVC (Model–View–Controller) dengan tujuan memisahkan logika bisnis, pengelolaan data, dan tampilan antarmuka. Dengan pemisahan ini, kode menjadi lebih terstruktur, mudah dikembangkan, dan lebih mudah dipelihara.
1. Model: Folder models/ berisi seluruh komponen yang berhubungan dengan data dan database. Model bertanggung jawab untuk melakukan koneksi ke database, eksekusi query SELECT/INSERT/UPDATE/DELETE dan mengelola objek data seperti Lecturer dan Subject. File pentingnya adalah:
- DB.php: Berisi class DB yang menangani koneksi database dan menyediakan fungsi execute() dan getRows() untuk query.
- Lecturer.php: Mengelola seluruh proses CRUD untuk data dosen, seperti menampilkan semua dosen, menambahkan dosen baru menghapus dosen dan meng-update data dosen
- Subject.php: Sama seperti Lecturer, tetapi untuk mengelola data mata kuliah (subject).
Model tidak memiliki kode HTML, karena hanya fokus pada pengelolaan data.

2. Controller: Folder controllers/ berisi script yang berfungsi mengatur alur data dari Model ke View. Tugas Controller adalah menerima input dari user (GET/POST), memanggil fungsi yang sesuai pada Model, menentukan View mana yang harus ditampilkan, mengirimkan data ke View dalam format array ready-to-render. Controller utamanya ada LecturerController.php dan SubjectController.php

3. View: Folder views/ berisi seluruh file tampilan (UI frontend) yang ditampilkan ke user. View hanya bertugas untuk menampilkan data yang diberikan oleh Controller, menampilkan form input untuk create/edit, menampilkan tabel daftar lecturer dan subject. View tidak boleh berisi logika database. Struktur view terdiri dari:
- LecturerView.php → halaman list lecturer
- SubjectView.php → halaman list subject
- createLec.php / createSub.php → halaman form create
- editLec.php / editSub.php → halaman form update

4. Templates: Folder ini berfungsi untuk memisahkan elemen tampilan yang bersifat tetap dan digunakan berulang di setiap halaman. Folder templates berisi dua file utama, yaitu header dan footer. File header menyimpan struktur tampilan bagian atas halaman, seperti tag pembuka HTML, pengaturan gaya (CSS), serta navigasi atau menu utama. Dengan pemisahan ini, setiap halaman dalam aplikasi tidak perlu menuliskan ulang bagian kepala halaman, sehingga tampilan menjadi seragam dan lebih mudah dikelola. Sementara itu, file footer berisi bagian penutup halaman, seperti pemanggilan script yang diperlukan oleh sistem serta penutup struktur HTML. Pemisahan footer memastikan bahwa setiap halaman memiliki penutup tampilan yang konsisten dan memuat seluruh script yang dibutuhkan tanpa harus menuliskannya satu per satu.

5. Tabel Subject: Tabel ini dibuat untuk menyimpan data mata kuliah seperti nama dan SKS. Tabel ini kemudian dihubungkan ke tabel Lecturer melalui kolom subject (tambahan atribut) yang menyimpan id_subject sebagai foreign key. Dengan relasi ini, setiap dosen bisa dikaitkan dengan mata kuliah yang diampu tanpa perlu menyimpan data mata kuliah secara berulang. 

# Alur Eksekusi Program
Alur MVC pada aplikasi ini adalah:
- User melakukan request ke suatu halaman (misalnya index.php atau editSub.php).
- File view memanggil Controller yang relevan.

Controller:
- Mengambil input (GET/POST)
- Memanggil fungsi Model untuk mengambil atau memodifikasi data
- Model berkomunikasi dengan database
- Hasil Model dikembalikan ke Controller
- Controller mengirimkan data ke View
- View menampilkan hasilnya kepada user

Dengan alur ini, tugas setiap bagian menjadi jelas dan tidak saling bercampur.

# Dokumentasi
CRUD Lecturer 
https://github.com/user-attachments/assets/edb1ea13-d17b-4a27-96e5-ff0145919088

CRUD Subject
https://github.com/user-attachments/assets/88700764-198d-4c57-aaeb-7a6d05f9dbcf



