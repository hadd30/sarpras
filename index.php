<?php

    session_start();
    if(!isset($_SESSION['id_user'])) {
        header("Location:login.php");
        exit();
    }

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 30px;
        color: #333;
        background-image: url('imgg.jpg');
        background-size: cover;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 10px;
        font-weight: bold;
        font-size : 40px;
    }

    .nav-bar {
        margin-bottom: 20px;
    }

    .nav-bar a {
        text-decoration: none;
        color: gray;
        font-weight: bold;
        margin-right: 15px;
        font-size: 17px;
    }

    .nav-bar a:hover {
        color: white;
    }

    hr {
        border: none;
        height: 1px;
        background-color: white;
        margin: 20px 0;
    }

    .content {
        background-color: #fff;
        border: 1px solid #ddd;
        opacity: 0.8;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .user-info {
        font-size: 15px;
        margin-top: 10px;
    }

    .user-info strong {
        font-weight: bold;
    }
</style>


</head>
<body>
    <h2>SELAMAT DATANG <?php echo $_SESSION['nama_lengkap']; ?></h2>

    <div class="nav-bar">
        <a href="index.php?page=home">HOME</a>
        <a href="ruangan/index.php?page=ruangan">RUANGAN</a>
        <a href="kategori/index.php?page=kategori">KATEGORI</a>
        <a href="barang/index.php?page=barang">BARANG</a>
        <a href="logout.php">LOG-OUT</a>
    </div>

    <hr>

    <div class="content">
        <?php
        if ($page == 'home') {
            include 'home.php';
        } elseif ($page == 'index.php') {
            include 'ruangan/index.php';
        } elseif ($page == 'kategori') {
            include 'kategori/index.php';
        } elseif ($page == 'barang') {
            include 'barang/index.php';
        }
        ?>
    </div>

</body>
</html>