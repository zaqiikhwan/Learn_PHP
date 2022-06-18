<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel novel -> query data
$result = mysqli_query($conn, "SELECT * FROM novel");
if (!$result) {
    echo mysqli_error($conn);
}

// ambil data (fetch) novel dari object result
// mysqli_fetch_row() -> return array numeric
// mysqli_fetch_assoc() -> return array associative
// mysqli_fetch_array() -> return array numeric / array associative
// -> data yang disajikan double
// mysqli_fetch_object() -> return object

// while ($each = mysqli_fetch_assoc($result)) {
//     var_dump($each["judul"]);
// }

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
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i;?>.</td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?= $row["cover"];?>" ></td>
            <td><?= $row["judul"]?></td>
            <td><?= $row["pengarang"]?></td>
            <td><?= $row["penerbit"]?></td>
            <td><?= $row["tahun_terbit"]?></td>
            <td><?= $row["halaman"]?></td>
        </tr>
        <?php $i++;?>
        <?php endwhile; ?>
    </table>
</body>
</html>