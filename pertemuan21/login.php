<?php

session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc(($result));
    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek passwordnya
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Halaman Login</title>
</head>
<body>

    <main>
        <div class="container">
            <h1>Halaman Login</h1>
            <?php if (isset($error)) : ?>
                <p style="color: white; font-style: italic; position:absolute; margin-left:72px; padding:0; margin-top:172px;">username atau password salah</p>
            <?php endif; ?>
    
            <form action="" method="post" class="input-data">
                <ul>
                    <li class="uname">
                        <h4>
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="input-username">
                        </h4>
                    </li>
                    <li class="pw">
                        <h4>
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password" class="input-password">
                        </h4>
                    </li>
                    <li class="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </li>
                    <li>
                        <button class="login" type="submit" name="login">Login</button>
                    </li>
                </ul>
            </form>        
            <img class="bg-image" src="/assets/bg-login.jpg" alt="" srcset="" >
        </div>

    </main>

</body>
</html>