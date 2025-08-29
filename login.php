<?php

    session_start();
    include "koneksi.php";

    if(isset($_SESSION['id_user'])) {
        header ("Location : index.php");
        exit();
    }

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");

        if(mysqli_num_rows($query) > 0) {

            $data = mysqli_fetch_array($query);
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['email'] = $data['email'];

            echo "<script>alert ('Login Berhasil!'); window.location.href='index.php';</script>";
        }else {
            echo "<script>alert ('Login Gagal'); window.location.href='login.php';</script>";
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
        background-color: #f2f2f2;
        stroke : white;
        stroke-width : 0.1px;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('imgg.jpg');
        background-size: cover;
    }

    .login-container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 350px;
        opacity: 0.6;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    table {
        width: 100%;
    }

    td {
        padding: 8px 0;
        vertical-align: middle;
        color: #333;
        font-size: 14px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: white;
        padding: 10px 15px;
        margin-top: 10px;
        width: 100%;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

    <!-- <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f2f2f2;
}

.login-container {
    width: 350px;
    margin: 50px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-header {
    text-align: center;
    margin-bottom: 20px;
}

.login-header h2 {
    font-weight: bold;
    color: #333;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    color: #666;
    font-size: 16px;
}

.form-group input[type="text"], .form-group input[type="password"] {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 16px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.form-group input[type="submit"] {
    width: 100%;
    padding: 15px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.form-group input[type="submit"]:hover {
    background-color: #3e8e41;
}

.error {
    color: #443336;
    font-size: 14px;
    margin-top: 10px;
}

@media only screen and (max-width: 768px) {
    .login-container {
        width : 90%;
        margin: 20px auto;
    }
}

    </style> -->


</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Log-In</h2>

            <form action="" method="POST" class="form-group"> 
                <table>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="text" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="login" value="Login">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>