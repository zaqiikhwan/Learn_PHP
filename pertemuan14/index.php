<?php
// koneksi ke database melalui file functions.php
require 'functions.php';
// apabila ingin diurutkan berdasarkan id yang paling besar terlebih dahulu
// menggunakan descending (DESC)
// jika id yang paling kecil menggunakan ASC (ascending)
// $novel = query("SELECT * FROM novel ORDER BY id ASC");
// $novel = query("SELECT * FROM novel WHERE judul = 'Bumi'");
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
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Novel</h1>

    <a href="tambah.php">Tambah Data Novel</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus
        placeholder="masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
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