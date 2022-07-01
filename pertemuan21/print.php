<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

$novel = query("SELECT * FROM novel");

$mpdf = new \Mpdf\Mpdf();
$html = 
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Novel</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Novel</h1>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <td>No.</td>
            <td>Cover</td>
            <td>Judul</td>
            <td>Pengarang</td>
            <td>Penerbit</td>
            <td>Tahun Terbit</td>
            <td>Jumlah Halaman</td>
        </tr>';
        $i = 1;
    foreach($novel as $row) {
        $html .= 
        '<tr>
            <td>'. $i++ .'</td>
            <td><img src="img/'. $row["cover"].'"></td>
            <td>'.$row["judul"].'</td>
            <td>'.$row["pengarang"].'</td>
            <td>'.$row["penerbit"].'</td>
            <td>'.$row["tahun_terbit"].'</td>
            <td>'.$row["halaman"].'</td>
        </tr>';
    }
$html .= 
'</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-novel.pdf', 'I');

?>