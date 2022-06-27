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

    //upload gambar
    $cover = upload();
    if (!$cover) {
        return false;
    }

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

function upload() {
    $namaFile = $_FILES['cover']['name'];
    $ukuranFile = $_FILES['cover']['size'];
    $error = $_FILES['cover']['error'];
    $tmpName = $_FILES['cover']['tmp_name'];

    // cek apakah tidak ada gambar yang diuplaod
    if ($error === 4) {
        echo "<script>
        alert('tidak ada file gambar yang diupload!')
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $validasiEktensiCover = ['jpg', 'jpeg', 'png'];
    $ekstensiCover = explode('.', $namaFile);
    $ekstensiCover = strtolower(end($ekstensiCover));

    if (!in_array($ekstensiCover, $validasiEktensiCover)) {
        echo "<script>
        alert('yang anda upload bukan gambar!')
        </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    // lolos pengecekan, cover novel siap diupload

    // generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiCover;
    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;
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
    $existCover = htmlspecialchars($data["existCover"]);

    // cek apakah user pilih cover baru atau tidak
    if ($_FILES['cover']['error'] === 4) {
        $cover = $existCover;
    } else {
        $cover = upload();
    }

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

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo 
        "
        <script>
        alert('username telah digunakan!')
        </script>
        ";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!')</script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_BCRYPT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES(
        '',
        '$username',
        '$password'
    )");
    return mysqli_affected_rows($conn);
}
?>