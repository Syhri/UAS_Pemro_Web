<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'uas_website';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
