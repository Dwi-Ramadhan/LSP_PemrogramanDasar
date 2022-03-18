<?php
include 'connection.php';
$listBarang = $conn->query("SELECT * FROM barang");
include 'master.php';
?>
<div class="container">
    <div class="row">
        <div class="segment">
            <h1>Daftar Barang</h1>
        </div>
        <div class="col-lg-2">
            <a href="tambahBarang.php"><button type="button" class="btn btn-primary btn-lg">Tambah Barang</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-dark">
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Foto</th>
                </tr>
                <?php
                foreach ($listBarang as $barang) {
                    echo "
                    <tr>
                        <td>$barang[id_barang]</td>
                        <td>$barang[nama]</td>
                        <td>$barang[harga]</td>
                        <td>$barang[stok]</td>
                        <td><img src='image/$barang[foto]' alt='gambar $barang[foto] tidak tersedia' width=100px height=100px></td>
                        <td>
                            <a href=\"editBarang.php?kode=$barang[id_barang]\">Edit</a> |
                            <a href=\"hapusBarang.php?kode=$barang[id_barang]\">Hapus</a> 
                        </td>
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