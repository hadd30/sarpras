<?php

    include "../koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM kategori");


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
        margin: 30px;
        background-color: #f9f9f9;
        color: #333;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: #007BFF;
        margin-right: 10px;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
        color: #0056b3;
    }

    .kategori-item {
        background-color: #ffffff;
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .kategori-item p {
        margin: 5px 0;
    }

    hr {
        margin-top: 20px;
    }

    .nav-links {
        margin-bottom: 20px;
    }

    table {
        margin-top: 35px;
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
        font-size: 14px;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    a {
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

</style>


</head>
<body>
    <h2>Halaman Utama Kategori</h2>

    <div class="nav-link">
        <a href="tambah.php">Tambah Data</a>
        <a href="../index.php">Kembali</a>

        <hr>

        <table border="1">
            <tr>
                <th>No</th>
                <th>Id Kategori</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Edit $ Hapus</th>
            </tr>

            <?php
                $no = 1;
                while($data = mysqli_fetch_array($query)) : ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['id_kategori']; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td>
                    <a href="edit.php?id_kategori=<?= $data['id_kategori']; ?>">Edit</a>
                    <a href="hapus.php?id_kategori=<?= $data['id_kategori']; ?>" onclick="return confirm('Apakah Anda yakin akan mengahpus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>
</body>
</html>