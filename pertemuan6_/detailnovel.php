<?php
if (!isset ($_GET["judul"])) {
    header("Location: daftarnovel.php");
    exit;
} 
$novels = [
    [
        "judul" => "Bumi",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "halaman" => "436",
        "gambar" => "bumi.jpg"
    ],
    [
        "judul" => "Bulan",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "halaman" => "404",
        "gambar" => "bulan.jpg"
    ],
    [
        "judul" => "Rindu",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "halaman" => "404",
        "gambar" => "rindu.jpg"
    ],
    [
        "judul" => "Selena",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "halaman" => "372",
        "gambar" => "selena.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Novel</title>
</head>
<body>
    <?php for ($i=0; $i < count($novels); $i++) : ?> 
        <?php if ($_GET["judul"] == $novels[$i]["judul"]) : ?>
            <ul>
                <img src="img/<?= $novels[$i]["gambar"]; ?>" alt="novel picture">
                <li>Judul Novel : <?= $novels[$i]["judul"] ?></li>
                <li>Pengarang : <?= $novels[$i]["pengarang"] ?></li>
                <li>Penerbit : <?= $novels[$i]["penerbit"] ?></li>
                <li>Jumlah Halaman : <?= $novels[$i]["halaman"] ?></li>
            </ul>
            <a href="daftarnovel.php">Kembali ke menu utama</a>
        <?php endif ?>
    <?php endfor ?>
</body>
</html>
