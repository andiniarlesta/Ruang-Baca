<!DOCTYPE html>
<html>
<head>
    <title>Form RUANG BACA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_buku
    if (isset($_GET['id_buku'])) {
        $id_buku=input($_GET["id_buku"]);

        $sql="select * from tb_buku where id_buku=$id_buku";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }
    // $id = $_GET['id_buku'];

    // $tampil = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku = $id");
    // $data = mysqli_fetch_array($tampil);

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $judul=input($_POST["judul"]);
        $penulis=input($_POST["penulis"]);
        $penerbit=input($_POST["penerbit"]);
        $tahun_terbit=input($_POST["tahun_terbit"]);
        $isbn=input($_POST["isbn"]);
        $stok=input($_POST["stok"]);
        $des=input($_POST["deskripsi"]);
        $gambar = basename($_FILES["cover_img"]["name"]);
        $harga = input($_POST["harga"]);
        

        //Query update data pada tabel buku
        $sql="update tb_buku set
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
            $hasil=mysqli_query($kon, $sql);

            // $stmt = $koneksi->prepare($sql);
            // $stmt->bind_param("ssssssi", $judul, $penulis, $penerbit, $tahun_terbit, $isbn, $stok, $id_buku);
            // $stmt->execute();
    
            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
    
            }
            
        } 
    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">>
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukan judul buku" required value="<?= $data['judul'] ?>" />

        </div>
        <div class="form-group">
            <label>Penulis:</label>
            <input type="text" name="penulis" class="form-control" placeholder="Masukan nama penulis" required value="<?= $data['penulis'] ?>" />
        </div>
        <div class="form-group">
            <label>Penerbit :</label>
            <input type="text" name="penerbit" class="form-control" placeholder="Masukan penerbit" required value="<?= $data['penerbit'] ?>"/>
        </div>
        <div class="form-group">
            <label>Tahun terbit:</label>
            <input type="text" name="tahun_terbit" class="form-control" placeholder="Masukan tahun terbit" required value="<?= $data['tahun_terbit'] ?>"/>
        </div>
        <div class="form-group">
            <label>ISBN:</label>
            <input type="text" name="isbn" class="form-control" rows="5"placeholder="Masukan ISBN" required value="<?= $data['isbn'] ?>"/></input>
        </div>
        <div class="form-group">
            <label>Stok:</label>
            <input type="text" name="stok" class="form-control" rows="5"placeholder="Masukan jumlah stok" required value="<?= $data['stok'] ?>"/></input>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Masukan sinopsis buku" required value="<?= $data['deskripsi'] ?>"/>
        </div>
        <div class="form-group">
            <label> COVER BOOK </label>
            <input type="file" name="cover_img" class="form-control" placeholder="Masukkan url gambar" require value="<?= $data['cover_img'] ?>"/> </input>
        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga" required value="<?= $data['harga'] ?>"/>
        </div>

        <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>