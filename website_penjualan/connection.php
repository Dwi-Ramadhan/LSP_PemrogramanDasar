<?php
$conn = new mysqli('localhost', 'root', 'root', 'website_penjualan', '3306');
if ($conn->connect_error) {
    throw new Exception('Failed to open connecion : ' . $mysqli->connect_error);
}
