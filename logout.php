<?php

    session_start();
    session_destroy();

    echo "<script>alert('Anda Telah Log-Out!'); window.location.href='login.php';</script>";
    exit();
?>