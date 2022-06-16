<?php
// $mahasiswa = [
//     ["Nama", "NIM", "Email", "Jurusan"],
//     ["Nama1", "NIM1", "Email1", "Jurusan1"]
// ];
// if (!isset($_POST["submit"])) {
//     header("Location: login.php");
//     exit;
// }
// array associative
// definisinya sama seperti array numeric, kecuali
// key-nya adalah string yang kita buat sendiri
$judulnovel = ["Bumi", "Bulan", "Rindu", "Selena"];
// $novels = [
//     [
//         "judul" => "Bumi",
//         "pengarang" => "Tere Liye",
//         "penerbit" => "Gramedia Pustaka Utama",
//         "halaman" => "436",
//         "gambar" => "bumi.jpg"
//     ],
//     [
//         "judul" => "Bulan",
//         "pengarang" => "Tere Liye",
//         "penerbit" => "Gramedia Pustaka Utama",
//         "halaman" => "404",
//         "gambar" => "bulan.jpg"
//     ],
//     [
//         "judul" => "Rindu",
//         "pengarang" => "Tere Liye",
//         "penerbit" => "Gramedia Pustaka Utama",
//         "halaman" => "404",
//         "gambar" => "rindu.jpg"
//     ],
//     [
//         "judul" => "Selena",
//         "pengarang" => "Tere Liye",
//         "penerbit" => "Gramedia Pustaka Utama",
//         "halaman" => "372",
//         "gambar" => "selena.jpg"
//     ]
// ];
// echo $mahasiswa[1]["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Novel</title>
</head>
<body>
    <h1>Daftar Novel</h1>
    <?php foreach($judulnovel as $jno) : ?>
        <ul>
            <li><a href="detailnovel.php?judul=<?= $jno; ?>"><?= $jno ?></a></li>
        </ul>
    <?php endforeach; ?>
    <form action="login.php" method="post">
        <button type="submit" name="submit">Log Out</button>
    </form>
</body>
</html>