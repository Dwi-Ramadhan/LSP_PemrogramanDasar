Nama        : Dwi Ramadhan Rivaldo
Contact     : 089512758207 (WA/Telp)
              dwirivaldo51@smk.belajar.id (email)

Deskripsi Program:
 Website penjualan ini saya buat menggunakan PHP,HTML,CSS,
 dan Javascript, untuk Database mengunakan MySQL.
 Struktur database untuk website ini dapat dilihat di
 file "databaseChart.jpg".

Fitur Website ini diantaranya
- Login
   Mengunakan nama & password yg ada pd table 'user' di DB
   Salah satunya : nama = "Dwi Ramadhan", password = "drr"
- Menambah, Mengedit, dan Menghapus Data Barang
   Barang yang ditambah harus unique.
- Tambah Data Penjualan
   Memilih barang yg akan dibeli dan jumlahnya
   dan program akan otamatis menghitung total harga.
   Klik 'simpan' untuk menyimpan data transaksi, dan program
   akan otamatis mengupdate stok barang yang telah dibeli.
- Laporan Penjualan
   Menampilkan data trasaksi-transaksi yg pernah dilakukan
   meliputi nama pembeli, tanggal, barang-barang yg dibeli
   dan jumah masing-masing, serta total harga.

Cara menjalankan:
 1. Import file 'website_penjualan.sql' ke DB MySQL
 3. Sesuaikan konfigurasi koneksi ke database di file
    'website_penjualan/connection.php"

    Default : user = 'root'
	      password = 'root'
              database = 'website_penjualan'
    Tapi anda dapat mengubah ini sesuai dengan konfigurasi
    Database anda, misalnya mengganti user dan passwordnya.

 4. "Host" folder 'website_penjualan/' di web server.
    Dan akses melalui browser. 
    misal : 'http://localhost/index.php'