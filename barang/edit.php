<?php

    include "../koneksi.php";

    $id_barang  = $_GET["id_barang"];

    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['update'])) {
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $kondisi = $_POST['kondisi'];

        $update_query = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', stok='$stok', kondisi='$kondisi'");

        if($update_query) {
            echo "<script>alert ('Data Berhasil Di Edit'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert ('Data Gagal Di Edit'); window.location.href='edit.php';</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 40px;
            color: #333;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
        }

        a:hover {
            color: #0056b3;
        }

        hr {
            margin: 20px 0;
        }

        form {
            background-color: #fff;
            padding: 25px 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 5px;
            font-size: 14px;
            vertical-align: middle;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
</style>

</head>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Edit Data Barang</h2>
    <form method="POST">
        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" required>
                        <option value="">-- Pilih kategori --</option>
                        <?php
                        while($id_kategori = mysqli_fetch_array($q_kategori)) {
                            $selected = ($id_kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                            echo "<option value='{$id_kategori['id_kategori']}' $selected>{$id_kategori['nama_kategori']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" value="<?php echo $data['stok']; ?>" required></td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td>
                    <select name="kondisi" required>
                        <option value="">Silakan Pilih kondisi</option>
                        <option value="baik" <?= ($data['kondisi'] == 'baik') ? 'selected' : '' ?>>Baik</option>
                        <option value="kurang_baik" <?= ($data['kondisi'] == 'kurang_baik') ? 'selected' : '' ?>>Kurang Baik</option>
                        <option value="rusak" <?= ($data['kondisi'] == 'rusak') ? 'selected' : '' ?>>Rusak</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Update">
                    <a href="index.php?page=barang">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
