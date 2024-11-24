<?php
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form RUANG BACA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
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
            <label>Kategori</label>
            <select class="form-select" name="penerbit">
                    <option selected>--Pilih Kategori--</option>
                    <option value="1">Fiction</option>
                    <option value="2">Non-Fiction</option>
                    <option value="3">Poetry</option>
            </select>
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

        <button type="submit" name="updateBuku" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>