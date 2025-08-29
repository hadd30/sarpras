<?php

    include "../koneksi.php";

    $id_ruangan = $_GET["id_ruangan"];

    $query = mysqli_query($koneksi, "DELETE FROM ruangan WHERE id_ruangan='$id_ruangan'");

    echo "<script>alert ('Data Berhasil Di Hapus'); window.location.href='index.php';</script>";

?>