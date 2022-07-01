<?php
usleep(500000);
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM novel 
            WHERE 
              judul LIKE '%$keyword%' OR
              pengarang LIKE '%$keyword%' OR
              penerbit LIKE '%$keyword%' OR
              tahun_terbit LIKE '%$keyword%' OR
              halaman LIKE '%$keyword%'
        ";
$novel = query($query);


?>

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