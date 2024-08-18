<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Laporan Penjualan</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah Terjual</th>
            <th>Total Penjualan</th>
            <th>Laba Kotor</th>
            <th>Laba Bersih</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'koneksi.php';
        $result = $conn->query("SELECT penjualan.*, barang.nama_barang FROM penjualan INNER JOIN barang ON penjualan.barang_id = barang.id");
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['nama_barang']}</td>
                <td>{$row['jumlah']}</td>
                <td>{$row['total']}</td>
                <td>{$row['laba_kotor']}</td>
                <td>{$row['laba_bersih']}</td>
                <td>{$row['tanggal']}</td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>

    <h3>Total Laba Kotor: 
        <?php
        $result = $conn->query("SELECT SUM(laba_kotor) AS total_laba_kotor FROM penjualan");
        $total_laba_kotor = $result->fetch_assoc()['total_laba_kotor'];
        echo $total_laba_kotor;
        ?>
    </h3>
    <h3>Total Laba Bersih: 
        <?php
        $result = $conn->query("SELECT SUM(laba_bersih) AS total_laba_bersih FROM penjualan");
        $total_laba_bersih = $result->fetch_assoc()['total_laba_bersih'];
        echo $total_laba_bersih;
        ?>
    </h3>
</div>
</body>
</html>
