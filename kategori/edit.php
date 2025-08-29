<?php

    include "../koneksi.php";

    $id_kategori = $_GET["id_kategori"];
    
    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['update'])) {
        $nama_kategori = $_POST['nama_kategori'];
        $deskripsi = $_POST['deskripsi'];

        $update_query = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori', deskripsi='$deskripsi' WHERE id_kategori = $id_kategori");

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
    <a href="index.php"></a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td><input type="text" name="nama_kategori" value="<?php echo $data['nama_kategori']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><textarea name="deskripsi"><?php echo $data['deskripsi']?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update Data"></td>
                <td></td>
                <td><a href="index.php">Kembali</a></td>
            </tr>
        </table>
    </form>
</body>
</html>