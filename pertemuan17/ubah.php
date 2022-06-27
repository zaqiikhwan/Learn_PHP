<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$nvl = query("SELECT * FROM novel WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo 
        "
        <script>
            alert('data berhasil diubah!')
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo 
        "
        <script>
            alert('data gagal diubah!')
            document.location.href = 'index.php'
        </script>
        ";
    }

}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Novel</title>
</head>
<body>
    <h1>Ubah Data Novel</h1> 
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden", name="id" value="<?= $nvl["id"]; ?>">
        <input type="hidden", name="existCover" value="<?= $nvl["cover"]; ?>">
        <ul>
            <!-- judul -->
            <li>
                <label for="judul">Judul: </label>
                <input type="text" name="judul" id="judul" 
                required value="<?= $nvl["judul"]; ?>">
            </li>
            <!-- pengarang -->
            <li>
                <label for="pengarang">Pengarang: </label>
                <input type="text" name="pengarang" id="pengarang"
                required value="<?= $nvl["pengarang"]; ?>">
            </li>
            <!-- penerbit -->
            <li>
                <label for="penerbit">Penerbit: </label>
                <input type="text" name="penerbit" id="penerbit"
                required value="<?= $nvl["penerbit"]; ?>">
            </li>
            <!-- tahun_terbit -->
            <li>
                <label for="tahun_terbit">Tahun: </label>
                <input type="text" name="tahun_terbit" id="tahun_terbit"
                required value="<?= $nvl["tahun_terbit"]; ?>">
            </li>
            <!-- halaman -->
            <li>
                <label for="halaman">Halaman: </label>
                <input type="text" name="halaman" id="halaman"
                required value="<?= $nvl["halaman"]; ?>">
            </li>
            <!-- cover -->
            <li>
                <label for="cover">Cover: </label>
                <br>
                <img src="img/<?= $nvl['cover']?>">
                <br>
                <input type="file" name="cover" id="cover">
            </li>
            <!-- button -->
            <li> 
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>