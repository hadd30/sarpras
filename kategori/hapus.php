<?php

    include "../koneksi.php";

    $id_kategori = $_GET["id_kategori"];

    $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");
    
    if($query) {
        echo "<script>alert ('Data Berhasil Di Hapus'); window.location.href='index.php';</script>";
    }   else {
        echo "<script>alert ('Data Gagal Di Hapus'); window.location.href='index.php';</script>";
    }   

?>