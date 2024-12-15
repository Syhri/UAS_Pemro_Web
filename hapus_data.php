<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan ID
    $query = "DELETE FROM data_mahasiswa WHERE ID = $id";
    if ($conn->query($query)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
}

header("Location: index.php");
exit();
