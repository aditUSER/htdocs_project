<?php
include 'koneksi.php';

$barang_id = $_POST['barang'];
$jumlah = $_POST['jumlah'];

// Ambil data barang dari database
$sql = "SELECT * FROM barang WHERE id = $barang_id";
$result = $conn->query($sql);
$barang = $result->fetch_assoc();

if ($barang['stok'] < $jumlah) {
    echo "<script>alert('Stok tidak mencukupi!'); window.location.href='formBeli.php';</script>";
    exit();
}

// Hitung total harga, laba kotor dan bersih
$total = $barang['harga_jual'] * $jumlah;
$laba_kotor = ($barang['harga_jual'] - $barang['harga_beli']) * $jumlah;
$laba_bersih = $laba_kotor * 0.9; // Asumsi laba bersih adalah 90% dari laba kotor setelah biaya operasional

// Kurangi stok
$new_stok = $barang['stok'] - $jumlah;
$conn->query("UPDATE barang SET stok = $new_stok WHERE id = $barang_id");

// Simpan transaksi penjualan ke database
$conn->query("INSERT INTO penjualan (barang_id, jumlah, total, laba_kotor, laba_bersih, tanggal) VALUES ($barang_id, $jumlah, $total, $laba_kotor, $laba_bersih, NOW())");

// Berikan peringatan jika stok menipis
if ($new_stok <= 10) {
    echo "<script>alert('Stok barang {$barang['nama_barang']} tinggal sedikit!');</script>";
}

echo "<script>alert('Pembelian berhasil!'); window.location.href='formBeli.php';</script>";
?>
