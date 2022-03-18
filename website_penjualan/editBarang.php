<?php
include 'connection.php';
$data = $conn->query("SELECT * FROM barang WHERE id_barang='$_GET[kode]'");
$barang = mysqli_fetch_array($data);

if (isset($_POST["submit"])) {
    $target_dir = "image/";
    $fileName = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $fileName;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($fileName)) {
        //update data barang in database
        $conn->query("UPDATE barang SET nama='$_POST[nama]', harga='$_POST[harga]', stok='$_POST[stok]' WHERE id_barang='$_GET[kode]'");
        if ($conn->error) {
            echo $conn->error;
        } else {
            header("Location: daftarBarang.php");
        }
    } else {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            // Allow certain file formats
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                // Check if file already exists
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                }
                //update data barang in database
                $conn->query("UPDATE barang SET nama='$_POST[nama]', harga='$_POST[harga]', stok='$_POST[stok]', foto='$fileName' WHERE id_barang='$_GET[kode]'");
                if ($conn->error) {
                    echo $conn->error;
                } else {
                    header("Location: daftarBarang.php");
                }
            }
        }
        echo "Error when uploading file";
    }
}
include 'master.php';
?>
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="kode">Kode Barang </label>
        <input type="text" name="kode" id="kode" value="<?php echo $barang['id_barang']; ?>" disabled class="form-control">
        <label for="nama">Nama Barang </label>
        <input type="text" name="nama" id="nama" value="<?php echo $barang['nama']; ?>" class="form-control">
        <label for="harga">Harga Jual</label>
        <input type="number" name="harga" id="harga" value="<?php echo $barang['harga']; ?>" class="form-control">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="<?php echo $barang['stok']; ?>" class="form-control">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" value="<?php echo $barang['foto']; ?>" class="form-control">
        <br>
        <input type="submit" value="Edit Barang" name="submit" class="btn btn-primary btn-lg btn-block">
    </form>
</div>
<?php
include 'footer.php';
?>