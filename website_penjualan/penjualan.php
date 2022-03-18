<?php
include 'connection.php';
include 'master.php';
$listBarang = $conn->query("SELECT * FROM barang");
$listUser = $conn->query("SELECT id_user,nama FROM user");

if (isset($_POST['submit'])) {
    $query = $conn->query("SELECT * FROM barang where id_barang='{$_POST['kode']}'");
    $data = mysqli_fetch_array($query);
    $jumlah = $_POST['jumlah'];
    $harga = $data['harga'];
    $total = (int)$harga * (int)$jumlah;
    $date = date("Y-m-d", strtotime("now"));
    $id_user = $_POST['user'];

    $conn->query(
        <<<SQL
            INSERT INTO penjualan (id_user,tanggal,id_barang,jumlah,total)
            VALUES('$id_user','$date','{$_POST['kode']}','$jumlah','$total');
        SQL
    );
    if ($conn->error) {
        echo $conn->error;
    } else {
        header("Location: daftarPenjualan.php");
    }
}

?>
<div class="container">
    <form action="" method="POST">
        <label for="user">Konsumen</label>
        <select name="user" id="user" class="form-control">
            <?php
            foreach ($listUser as $user) {
                echo "<option value='$user[id_user]'> $user[nama] </option>";
            }
            ?>
        </select>
        <br>
        <label for="kode">Barang</label>
        <select name="kode" id="kode" class="form-control">
            <?php
            foreach ($listBarang as $barang) {
                echo "<option value='$barang[id_barang]'> $barang[nama] </option>";
            }
            ?>
        </select>
        <br>
        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" class="form-control">
        <br>
        <input type="submit" value="Simpan Transaksi" name="submit" class="btn btn-primary btn-lg btn-block">
    </form>
</div>
<?php
include 'footer.php';
?>