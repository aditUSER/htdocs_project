<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Form Pembelian Barang</h2>
    <form action="prosesBeli.php" method="post">
        <div class="form-group">
            <label for="barang">Pilih Barang:</label>
            <select class="form-control" id="barang" name="barang">
                <?php
                // Mengambil data dari database
                $result = $conn->query("SELECT * FROM barang");

                // Cek apakah ada data
                if ($result->num_rows > 0) {
                    // Menampilkan data di dropdown
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nama_barang']} - Stok: {$row['stok']}</option>";
                    }
                } else {
                    echo "<option>Tidak ada barang tersedia</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <button type="submit" class="btn btn-primary">Beli</button>
    </form>
</div>
</body>
</html>
