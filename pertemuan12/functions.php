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

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun = htmlspecialchars($data["tahun_terbit"]);
    $halaman = htmlspecialchars($data["halaman"]);
    $cover = htmlspecialchars($data["cover"]);

    $query = "UPDATE novel SET 
        judul = '$judul', 
        pengarang = '$pengarang', 
        penerbit = '$penerbit',
        tahun_terbit = '$tahun', 
        halaman = '$halaman', 
        cover = '$cover'
        WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $query = "SELECT * FROM novel 
            WHERE 
                judul LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                tahun_terbit LIKE '%$keyword%' OR
                halaman LIKE '%$keyword%'
            ";
    return query($query);
}

?>