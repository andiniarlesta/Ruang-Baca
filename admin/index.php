<?php
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    RUANG BACA</title>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">DAFTAR BUKU RUANG BACA</span>
        </div>
    </nav>
    <div class="container">
        <br>
        <h4>
            <center>DAFTAR BUKU</center>
        </h4>
        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-primary">
                            <th>No                  </th>
                            <th>Judul Buku          </th>
                            <th>Penulis             </th>
                            <th>Penerbit            </th>
                            <th>Tahun terbit        </th>
                            <th>ISBN                </th>
                            <th>Stok                </th>
                            <th>Deskripsi           </th>
                            <th>GAMBAR              </th>
                            <th>Harga               </th>
                            <th colspan='2'>Aksi    </th>

                        </tr>
            </thead>

            <?php
            $sql = "select * from tb_buku order by id_buku desc";

            $hasil = mysqli_query($koneksi, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no                  ; ?></td>
                        <td><?php echo $data["judul"]       ; ?></td>
                        <td><?php echo $data["penulis"]     ; ?></td>
                        <td><?php echo $data["penerbit"]    ; ?></td>
                        <td><?php echo $data["tahun_terbit"]; ?></td>
                        <td><?php echo $data["isbn"]        ; ?></td>
                        <td><?php echo $data["stok"]        ; ?> </td>
                        <td><?php echo $data["deskripsi"]   ; ?></td>
                        <td><?php echo $data["cover_img"]   ; ?> </td>
                        <td><?php echo $data["harga"]       ; ?></td>
                        <td>
                            <a href="update.php?id_buku= 
                        <?php 
                            echo htmlspecialchars($data['id_buku']);
                        ?>"
                                class="btn btn-warning" role="button">Update
                            </a>
                            <a href="?del=<?= $data['id_buku'] ?> " class="btn btn-danger"
                                role="button"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> Delete
                            </a>

                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
            </table>
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>

</html>