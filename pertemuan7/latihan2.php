<?php 
if (
    !isset($_GET["judul"]) || 
    !isset($_GET["pengarang"]) ||
    !isset($_GET["penerbit"]) ||
    !isset($_GET["tahun_terbit"]) ||
    !isset($_GET["halaman"]) ||
    !isset($_GET["gambar"])
    ) {
        // redirect
        header("Location: latihan1.php");
        exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["gambar"];?>" alt="novel picture"></li>
        <li><?= $_GET["judul"];?></li>
        <li><?= $_GET["pengarang"];?></li>
        <li><?= $_GET["penerbit"];?></li>
        <li><?= $_GET["tahun_terbit"];?></li>
        <li><?= $_GET["halaman"];?></li>
    </ul>
    <a href="latihan1.php">Kembali ke Daftar Novel</a>
</body>
</html>