<?php
include 'koneksi.php';
session_start(); // Mulai session

// Proses Tambah Data dan Upload Gambar
if (isset($_POST['submit'])) {
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $npm = $_POST['npm'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];

    // Proses Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($gambar);

    // Pindahkan file gambar ke folder uploads
    if (move_uploaded_file($tmp_name, $target_file)) {
        $query = "INSERT INTO data_mahasiswa (nama_mahasiswa, npm, prodi, email, gambar) 
                  VALUES ('$nama_mahasiswa', '$npm', '$prodi', '$email', '$gambar')";
        if ($conn->query($query)) {
            $_SESSION['message'] = "Data berhasil ditambahkan.";
        } else {
            $_SESSION['message'] = "Gagal menambahkan data: " . $conn->error;
        }
    } else {
        $_SESSION['message'] = "Gagal mengupload gambar.";
    }
    header("Location: index.php"); // Redirect ke halaman utama
    exit();
}
