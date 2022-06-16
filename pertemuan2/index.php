<?php 
// Pertemuan 2 - PHP Dasar
// syntax PHP

// Standar Output
// echo, print
// print_r -> debugging
// var_dump 

// var_dump("Muh Zaqi Ikhwanul Kiram");
// echo "Hai";

// Penulisan syntax PHP
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variabel dan Tipe Data
// Variabel
// tidak boleh diawal dengan angka, tetapi boleh mengandung angka

// $nama = "Muh Zaqi Ikhwanul Kiram";

// echo "Halo, nama saya $nama";

// Operator 
// aritmatika
// +, -, *, /, %
// echo 1+1;
// $x = 10;
// $y = 20;

// echo $x * $y;

// $nama_depan = "Zaqi";
// $nama_blkng = "Ikhwan";

// echo $nama_depan. " " .$nama_blkng

// Assignment 
// =, +=, -=, *=, /=, %=, .=
// $x = 1;
// $x -= 5;
// echo $x;

// $nama = "Eryc, Rayhan, Alby,";
// $nama .= " ";
// $nama .= "Zaqi";
// echo $nama

// Perbandingan
// <, >, <=, >=, ==
// var_dump(1 == "1");
// identitas 
// ===, !==
// var_dump(1 === "1");

// Logika
// &&, ||, !
$x = 30;
var_dump($x < 20 || $x % 2 == 0);
?>

<!-- // 1. PHP di dalam HTML -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Belajar PHP</title>
</head>
<body>
    // html di dalam php (kurang recommended)
    <?php echo "<h1>salken, ges</h1>" ?>
    // php di dalam html (recommended) 
    <h1>Halo, Selamat Datang <?php echo $nama?></h1>
    <p><?php echo "ini adalah paragraf"?></p>
</body>
</html> -->