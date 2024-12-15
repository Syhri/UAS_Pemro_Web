<?php
include 'koneksi.php';
session_start(); // Mulai session

// Query untuk Menampilkan Data
$query = "SELECT * FROM data_mahasiswa";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <style>
    .message {
      margin: 20px 0;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #f0f0f0;
    }
  </style>
</head>

<body>
  <!-- TAMBAH DATA -->
  <h1>Tambah Data Mahasiswa</h1>
  <?php
  if (isset($_SESSION['message'])) {
    echo '<div class="message">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
  }
  ?>
  <form action="tambah_data.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" required>
    <input type="text" name="npm" placeholder="NPM" required>
    <input type="text" name="prodi" placeholder="Prodi" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="file" name="gambar" required>
    <button type="submit" name="submit">Tambah Data</button>
  </form>

  <br>

  <!-- DATA TAMPIL -->
  <h1>Data Mahasiswa</h1>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Mahasiswa</th>
        <th>NPM</th>
        <th>Prodi</th>
        <th>Email</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?= $row['ID']; ?></td>
          <td><?= $row['nama_mahasiswa']; ?></td>
          <td><?= $row['npm']; ?></td>
          <td><?= $row['prodi']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><img src="images/<?= $row['gambar']; ?>" alt="<?= $row['nama_mahasiswa']; ?>" width="100"></td>
          <td>
            <a href="hapus_data.php?id=<?= $row['ID']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>

</html>