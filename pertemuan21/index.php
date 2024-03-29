<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// koneksi ke database melalui file functions.php
require 'functions.php';

$novel = query("SELECT * FROM novel");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $novel = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Halaman Admin</title>
    <style>
        .loader {
            position: absolute;
            width: 100px;
            top: 125px;
            left: 210px;
            z-index: -1;
            display: none;
        }

        @media print {
            .logout, .tambah, .form-cari, .aksi {
                display: none;
            }
        }
    </style>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script_.js"></script>
</head>
<body>

    <a href="logout.php" class="logout">Logout</a> | <a href="print.php" class="print" target="_blank">Cetak</a>

    <h1>Daftar Novel</h1>

    <a href="tambah.php" class="tambah">Tambah Data Novel</a>
    <br><br>

    <form action="" method="post" class="form-cari"> 
        <input type="text" name="keyword" size="30" autofocus
        placeholder="masukkan keyword pencarian.." autocomplete="off" 
        id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>

        <img src="img/loader.gif" class=loader>
    </form>

    <br>
    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td>No.</td>
                <td class="aksi">Aksi</td>
                <td>Cover</td>
                <td>Judul</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
                <td>Tahun Terbit</td>
                <td>Jumlah Halaman</td>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($novel as $row): ?>
            <tr>
                <td><?= $i;?>.</td>
                <td class="aksi">
                    <a href="ubah.php?id=<?= $row["id"];?>">ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><img src="img/<?= $row["cover"];?>"></td>
                <td><?= $row["judul"]?></td>
                <td><?= $row["pengarang"]?></td>
                <td><?= $row["penerbit"]?></td>
                <td><?= $row["tahun_terbit"]?></td>
                <td><?= $row["halaman"]?> Halaman</td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>