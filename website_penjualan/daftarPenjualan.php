<?php
include 'connection.php';
$res = $conn->query(
    <<<SQL
        SELECT id_penjualan, user.nama AS nama, barang.nama AS nama_barang, tanggal, jumlah, total
        FROM user, penjualan, barang
        WHERE penjualan.id_user = user.id_user AND penjualan.id_barang = barang.id_barang;
    SQL
);
$listPenjualan = $res->fetch_all(MYSQLI_ASSOC);
include 'master.php';
?>
<div class="container">
    <div class="row">
        <div class="segment">
            <h1>Laporan Penjualan</h1>
        </div>
        <div class="col-lg-2">
            <a href="penjualan.php"><button type="button" class="btn btn-primary btn-lg">Tambah Penjualan</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-dark">
                <tr>
                    <th>Nomor Faktur</th>
                    <th>Nama Konsumen</th>
                    <th>Tanggal Faktur</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <?php
                foreach ($listPenjualan as $penjualan) {
                    echo "
                    <tr>
                        <td>$penjualan[id_penjualan]</td>
                        <td>$penjualan[nama]</td>
                        <td>$penjualan[tanggal]</td>
                        <td>$penjualan[nama_barang]</td>
                        <td>$penjualan[jumlah]</td>
                        <td>$penjualan[total]</td>
                    </tr>
                ";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>