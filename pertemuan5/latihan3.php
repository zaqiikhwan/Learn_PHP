<?php
$mahasiswa = [
    ["Zaqi", 
    "215150201111012", 
    "Teknik Informatika", 
    "zaqiikhwan22@student.ub.ac.id"],

    ["Ikhwan", 
    "215150201111012", 
    "Teknik Informatika", 
    "zaqiikhwan22@student.ub.ac.id"]
]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs) : ?>

    <ul>
        <!-- pake foreach -->
        <!-- <?php foreach($mhs as $a) : ?>
            <li><?= $a; ?></li>
        <?php endforeach ?> -->

        <!-- pake manual -->
        <li>Nama : <?=$mhs[0];?></li>
        <li>NIM : <?=$mhs[1];?></li>
        <li>Jurusan : <?=$mhs[2];?></li>
        <li>Email : <?=$mhs[3];?></li>
    </ul>

    <?php endforeach ?>
    
</body>
</html>