<?php
//Include file koneksi, untuk koneksikan ke database
require_once "koneksi.php";

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["createBuku"])) {
        $judul = input($_POST["judul"]);
        $penulis = input($_POST["penulis"]);
        $penerbit = input($_POST["penerbit"]);
        $tahun_terbit = input($_POST["tahun_terbit"]);
        $isbn = input($_POST["isbn"]);
        $stok = input($_POST["stok"]);
        $des = input($_POST["deskripsi"]);
        $gambar = basename($_FILES['cover_img']['name']);
        $harga = input($_POST["harga"]);

        //Query input menginput data kedalam tb_buku
        $sql = "INSERT INTO tb_buku (judul, penulis, penerbit, tahun_terbit, isbn, stok, deskripsi, cover_img, harga) 
    VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn', '$stok', '$des', '$gambar', '$harga')";
        echo $sql;

        //Mengeksekusi/menjalankan query diatas
        $hasil = mysqli_query($koneksi, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    } else if (isset($_POST["updateBuku"])) {
        $judul = input($_POST["judul"]);
        $penulis = input($_POST["penulis"]);
        $penerbit = input($_POST["penerbit"]);
        $tahun_terbit = input($_POST["tahun_terbit"]);
        $isbn = input($_POST["isbn"]);
        $stok = input($_POST["stok"]);
        $des = input($_POST["deskripsi"]);
        $gambar = basename($_FILES["cover_img"]["name"]);
        $harga = input($_POST["harga"]);
        $id_buku = input($_POST["id_buku"]);


        //Query update data pada tabel buku
        $sql = "update tb_buku set
        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun_terbit='$tahun_terbit',
        isbn='$isbn',
        stok='$stok',
        deskripsi='$des',
        cover_img= '$gambar',
        harga='$harga'
        where id_buku= '$id_buku'";
        echo $sql;

        //Mengeksekusi/menjalankan query diatas
        $hasil = mysqli_query($koneksi, $sql);

        // $stmt = $koneksi->prepare($sql);
        // $stmt->bind_param("ssssssi", $judul, $penulis, $penerbit, $tahun_terbit, $isbn, $stok, $id_buku);
        // $stmt->execute();

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
}

// Fungsi untuk menghapus data buku
function delBuku($koneksi, $id)
{
    $sql = "DELETE FROM tb_buku WHERE id_buku = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    // Bind parameter dan eksekusi
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    // Periksa hasil eksekusi
    if ($result) return true;
    else return false;

    if (!$result) {
        echo "Kesalahan: " . mysqli_error($koneksi); // Tampilkan error dari MySQL
    }
}

// Cek apakah ada parameter `del` di URL
if (isset($_GET['del'])) {
    $id = $_GET['del'] ?? null;

    // Validasi parameter `del`
    if ($id === null || !ctype_digit($id)) {
        header("location:index.php?errno=3"); // Redirect jika parameter tidak valid
        exit;
    } else {
        // Panggil fungsi hapus
        $result = delBuku($koneksi, $id);
        if ($result) {
            header("location:index.php?success=1"); // Redirect jika berhasil
        } else {
            header("location:index.php?errno=5"); // Redirect jika gagal
        }
        exit;
    }
}

if (isset($_GET['id_buku'])) {
    $id_buku = input($_GET["id_buku"]);

    $sql = "select * from tb_buku where id_buku=$id_buku";
    $hasil = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($hasil);
}
