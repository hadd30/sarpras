<?php

    include "../koneksi.php";

    $id_ruangan = $_GET["id_ruangan"];
    
    $query = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'");
    $data = mysqli_fetch_array($query);

    if(isset($data['update'])) {
        $kode_ruangan = $_POST['kode_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $jenis_ruangan = $_POST['jenis_ruangan'];
        $lokasi = $_POST['lokasi'];
        $kapasitas = $_POST['kapasitas'];
        $kondisi = $_POST['kondisi'];

        $update_query = mysqli_fetch_array($koneksi, "UPDATE ruangan SET kode_ruangan='$kode_ruangan', nama_ruangan='$nama_ruangan', jenis_ruangan='$jenis_ruangan', lokasi='$lokasi', kapasitas='$kapasitas', kondisi='$kondisi' WHERE id_ruangan = $id_ruangan");

        if($update_query) {
            echo "<script>alert ('Data Berhasil Di Edit'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert ('Data Gagal Di Tambahkan'); window.location.href='edit.php';</script>";
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
    input[type="number"] {
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
<body>
    <h2>Halaman Edit</h2>
    <a href="index.php">Kembali</a>
    <hr>

    <form action="" method="GET">
        <table>
            <tr>
                <td>Kode Ruangan</td>
                <td>:</td>
                <td><input type="text" name="kode_ruangan" value="<?php echo $data['kode_ruangan']?>"></td>
            </tr>
            <tr>
                <td>Nama Ruangan</td>
                <td>:</td>
                <td><input type="text" name="nama_ruangan" value="<?php echo $data['nama_ruangan']?>"></td>
            </tr>
            <tr>
                <td>Jenis Ruangan</td>
                <td>:</td>
                <td><input type="text" name="jenis_ruangan" value="<?php echo $data['jenis_ruangan']?>"></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><input type="text" name="lokasi" value="<?php echo $data['lokasi']?>"></td>
            </tr>
            <tr>
                <td>Kapastitas</td>
                <td>:</td>
                <td><input type="kapasitas" name="kapasitas" value="<?php echo $data['kapasitas']?>"></td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td>:</td>
                <td><input type="text" name="kondisi" value="<?php echo $data ['kondisi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="update" value="Tambah Data">
                <a href="index.php"></a></td>
            </tr>
            </tr>
        </table>
    </form>
</body>
</html>