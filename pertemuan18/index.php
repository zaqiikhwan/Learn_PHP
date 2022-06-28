<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// koneksi ke database melalui file functions.php
require 'functions.php';

// pagination -> jumlah halaman = total data / data yang ditampilkan perhalaman
// konfigurasi
// $result = mysqli_query($conn, "SELECT * FROM novel");
// $jumlahData = mysqli_num_rows($result);

$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM novel")); // menghitung jumlah data
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$novel = query("SELECT * FROM novel LIMIT $awalData, $jumlahDataPerHalaman");

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
    <title>Halaman Admin</title>
</head>
<body>

    <a href="logout.php">Logout</a>

    <h1>Daftar Novel</h1>

    <a href="tambah.php">Tambah Data Novel</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus
        placeholder="masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>
    <!-- navigasi -->
    <!-- to previous -->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- to next -->
    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1?>">&raquo;</a>
    <?php endif; ?>

    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Aksi</td>
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
            <td>
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
</body>
</html>