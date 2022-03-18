<?php
include 'connection.php';
if (isset($_POST["submit"])) {
    $target_dir = "image/";
    $fileName = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $fileName;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
            // Check if file already exists
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            }
            //upload data barang to database
            $conn->query("INSERT INTO barang (id_barang,nama,harga,stok,foto) VALUES  ( {$_REQUEST['kode']}, '{$_REQUEST['nama']}', {$_REQUEST['harga']}, {$_REQUEST['stok']}, '$fileName');");
            if ($conn->error) {
                echo $conn->error;
            } else {
                header("Location: daftarBarang.php");
            }
        }
    }
}
include 'master.php';
?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="kode">Kode Barang </label>
        <input type="text" name="kode" id="kode" class="form-control">
        <label for="nama">Nama Barang </label>
        <input type="text" name="nama" id="nama" class="form-control">
        <label for="harga">Harga Jual</label>
        <input type="number" name="harga" id="harga" class="form-control">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
        <br>
        <input type="submit" value="Tambah Barang" name="submit" class="btn btn-primary btn-lg btn-block">
    </form>
    <?php
    include 'footer.php';
    ?>