<?php
require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo 
        "
        <script>
            alert('data berhasil ditambahkan!')
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo 
        "
        <script>
            alert('data gagal ditambahkan!')
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
    <title>Tambah Data Novel</title>
</head>
<body>
    <h1>Tambah Data Novel</h1> 
    <form action="" method="post">
        <ul>
            <!-- judul -->
            <li>
                <label for="judul">Judul: </label>
                <input type="text" name="judul" id="judul" 
                required>
            </li>
            <!-- pengarang -->
            <li>
                <label for="pengarang">Pengarang: </label>
                <input type="text" name="pengarang" id="pengarang"
                required>
            </li>
            <!-- penerbit -->
            <li>
                <label for="penerbit">Penerbit: </label>
                <input type="text" name="penerbit" id="penerbit"
                required>
            </li>
            <!-- tahun_terbit -->
            <li>
                <label for="tahun_terbit">Tahun: </label>
                <input type="text" name="tahun_terbit" id="tahun_terbit"
                required>
            </li>
            <!-- halaman -->
            <li>
                <label for="halaman">Halaman: </label>
                <input type="text" name="halaman" id="halaman"
                required>
            </li>
            <!-- cover -->
            <li>
                <label for="cover">Cover: </label>
                <input type="text" name="cover" id="cover"
                required>
            </li>
            <!-- button -->
            <li> 
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>