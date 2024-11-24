<?php
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>FORM RUANG BACA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Input Data</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul Buku:</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukan judul buku" required />

        </div>
        <div class="form-group">
            <label>Penulis:</label>
            <input type="text" name="penulis" class="form-control" placeholder="Masukan nama penulis buku" required/>
        </div>
       <div class="form-group">
            <label>Penerbit:</label>
            <input type="text" name="penerbit" class="form-control" placeholder="Masukan penerbit" required/>
        </div>
        <div class="form-group">
            <label>Tahun terbit:</label>
            <input type="text" name="tahun_terbit" class="form-control" placeholder="Masukan tahun terbit" required/>
        </div>
        <div class="form-group">
            <label>ISBN:</label>
            <input type="text" name="isbn" class="form-control" rows="5"placeholder="Masukan ISBN" required></input>
        </div>    
        <div class="form-group">
            <label>Stok:</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukan jumlah stok" required/>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" placeholder="Masukan sinopsis buku" required></textarea>
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
            <label> Cover buku </label>
            <input type="file" name="cover_img" class="form-control" placeholder="Masukkan url gambar" require> </input>
        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" required/>
        </div>


        <button type="submit" name="createBuku" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>