# ✨Online Shop With CodeIgniter 3✨

Proyek Online Shop With CodeIgniter 3 adalah proyek untuk membangun e-commerce berbasis website dengan tampilan sederhana dan mudah dipahami.

## Table of Contents
- [Fitur](#fitur)
- [Requirement](#requirement)
- [Database](#database)

### Fitur
- Menampilkan list barang yang dijual.
- Memasukkan barang pada keranjang.
- Melakukan _check out_ pada semua barang di keranjang.
- Melakukan input barang.

> [NOTE] Proyek ini tidak menangani pembuatan _account_, registrasi, dan pembayaran setelah melakukan _check out_.

### Requirement
- CodeIgniter Ver.3
- PHP 8.2.0
- Apache 2.4.54

### Database

Dalam database menggunakan 2 _tables_ dan 1 _tables_ dari hasil `many to many`.

database : tokoOnline

dbdriver : mysqli

**Table `barangToko`**
```
🔑ID : Primary Key | Int | AUTO_INCREMENT
NAMA : VARCHAR(255)
STOK : Int
HARGA : Int
FOTO : VARCHAR(255)
```

**Table `transaksi_penjualan`**
```
🔑ID : Primary Key | Int | AUTO_INCREMENT
TANGGAL : Date
NAMA : VARCHAR(50)
ALAMAT : VARCHAR(100)
KECAMATAN : VARCHAR(30)
KOTA : VARCHAR(30)
```

**Table many to many `jual`**
```
🗝️ID_BARANG : Foreign Key dari tabel barang | Int
🗝️ID_TRANSAKSI : Foreign Key dari tabel transaksi_penjualan | Int
STOK : Int
HARGA : Int
```

Relasi dari #ID --> #@ID_BARANG adalah `no action`. Relasi dari #ID --> #@ID_TRANSAKSI adalah `no action`.

> [NOTE] Database tidak berperan dalam penyimpanan data pada keranjang dikarenakan sudah di _handle_ menggunakan `session`.
