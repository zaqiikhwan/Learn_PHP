<?php
// array review
// make array
// $hari = array("Senin", "Selasa", "Rabu");
// $bulan = ["Januari", "Februari"];
// $arr = [100, "Hai", true];
// read array
// versi debugging
// var_dump($arr);
// echo "<br>";
// print_r($bulan);
// echo "<br>";
// echo $arr[0];
// echo "<br>";
// foreach ($arr as $a) {
//     echo $a;
//     echo "<br>";
// }
$angka = [
    [1, 2, 3], 
    [4, 5, 6], 
    [7, 8, 9]
];
// echo $angka[0][1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content=" IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: #BADA55;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 0.5s;
        }
        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <?php foreach($angka as $a) : ?>
        <?php foreach($a as $i) : ?> 
            <div class="kotak"><?= $i ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>