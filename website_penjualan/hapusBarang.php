<?php
include("connection.php");
$sql = $conn->query("DELETE FROM barang WHERE id_barang='$_GET[kode]'");
header("Location: daftarBarang.php");
?>
