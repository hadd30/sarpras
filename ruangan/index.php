<?php

    include "../koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM ruangan");
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
        margin-top: 30px;
    }

    .nav-links {
        margin-bottom: 20px;
    }
</style>

</head>
<body>
    <h2>Data Ruangan</h2>

    <div class="nav-link">
        <a href="tambah.php">Tambah Data</a> |
        <a href="../index.php">Kembali</a>
    </div>
    
    <hr>

    <?php
    
    while($data = mysqli_fetch_array($query)) {
        echo "ID RUANGAN : " . $data['id_ruangan'] . "<br>";
        echo "KODE RUANGAN : " . $data['id_ruangan'] . "<br>";
        echo "NAMA RUANGAN : " . $data['nama_ruangan'] . "<br>";
        echo "JENIS RUANGAN : " . $data['jenis_ruangan'] . "<br>";
        echo "LOKASI : " . $data['lokasi'] . "<br>";
        echo "KAPASITAS : " . $data['kapasitas'] . "<br>";
        echo "KONDISI : " . $data['kondisi'] . "<br>";
        echo "<a href='edit.php?id_ruangan=$data[id_ruangan]'>[ EDIT ]</a>";
        echo "<a href='hapus.php?id_ruangan=$data[id_ruangan]'>[ HAPUS ]</a><br>";
        echo "<hr>";
    }

    ?>
</body>
</html>