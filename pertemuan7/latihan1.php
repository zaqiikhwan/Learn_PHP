<?php
// $_GET()

// $_GET["nama"] = "Zaqi Ikhwan";
$novels = [
    [
        "judul" => "Bumi",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2014",
        "halaman" => "440 Halaman",
        "gambar" => "bumi.jpg"
    ],
    [
        "judul" => "Bulan",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2015",
        "halaman" => "440 Halaman",
        "gambar" => "bulan.jpg"
    ],
    [
        "judul" => "Matahari",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2016",
        "halaman" => "390 Halaman",
        "gambar" => "matahari.jpg"
    ],
    [
        "judul" => "Bintang",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2017",
        "halaman" => "392 Halaman",
        "gambar" => "bintang.jpg"
    ],
    [
        "judul" => "Ceros dan Batozar",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2018",
        "halaman" => "392 Halaman",
        "gambar" => "cerosdanbatazoar.jpg"
    ],
    [
        "judul" => "Komet",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2018",
        "halaman" => "384 Halaman",
        "gambar" => "komet.jpg"
    ],
    [
        "judul" => "Komet Minor",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2019",
        "halaman" => "376 Halaman",
        "gambar" => "kometminor.jpg"
    ],
    [
        "judul" => "Selena",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2020",
        "halaman" => "368 Halaman",
        "gambar" => "selena.jpg"
    ],
    [
        "judul" => "Nebula",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2020",
        "halaman" => "376 Halaman",
        "gambar" => "nebula.jpg"
    ],
    [
        "judul" => "Si Putih",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2021",
        "halaman" => "376 Halaman",
        "gambar" => "siputih.jpg"
    ],
    [
        "judul" => "Lumpu",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2021",
        "halaman" => "368 Halaman",
        "gambar" => "lumpu.jpg"
    ],
    [
        "judul" => "Bibi Gili",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2022",
        "halaman" => "368 Halaman",
        "gambar" => "bibigili.jpeg"
    ],
    [
        "judul" => "Sagaras",
        "pengarang" => "Tere Liye",
        "penerbit" => "Gramedia Pustaka Utama",
        "tahun_terbit" => "2022",
        "halaman" => "384 Halaman",
        "gambar" => "sagaras.jpeg"
    ]
];
// var_dump($_GET);
// Vaariable scope / lingkup variabel
// $x = 10; // -> variabel lokal
// echo $x;

// function tampilX() {
//     global $x;
//     echo $x;
// }

// tampilX();

//SUPERGLOBAL
// $_GET;
// $_POST;
// $_REQUEST;
// $_SESSION;
// $_COOKIE;
// $_SERVER;
// $_ENV;

// semua hal di atas merupakan array associative


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Novel</h1>
    <ul>
    <?php foreach ($novels as $novs) : ?>
        <li>
            <a href="latihan2.php?
            judul=<?= $novs["judul"]; ?>
            &pengarang=<?= $novs["pengarang"];?> 
            &penerbit=<?= $novs["penerbit"];?> 
            &tahun_terbit=<?= $novs["tahun_terbit"];?> 
            &halaman=<?= $novs["halaman"];?>
            &gambar=<?= $novs["gambar"];?>">
            <?= $novs["judul"]; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>