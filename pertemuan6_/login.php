<?php
    if( isset($_POST["submit"]) ) {
        if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
            header("Location: daftarnovel.php");
            exit;
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Admin</h1>

    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
    <?php endif; ?>

    <ul>
    <form action="" method="post">
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <button type="submit" name="submit">Login</button>
    </form>
    </ul>
</body>
</html>