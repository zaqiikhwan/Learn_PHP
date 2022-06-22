<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar"); 

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun = htmlspecialchars($data["tahun_terbit"]);
    $halaman = htmlspecialchars($data["halaman"]);
    $cover = htmlspecialchars($data["cover"]);

    $query = "INSERT INTO novel VALUES
    (
        '', 
        '$judul', 
        '$pengarang', 
        '$penerbit',
        '$tahun', 
        '$halaman', 
        '$cover'
    )
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM novel WHERE id = $id");

    return mysqli_affected_rows($conn);
}

?>