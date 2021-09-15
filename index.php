<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}


require 'functions.php';
$siswa = query("SELECT * FROM siswa");

//tombol cari ditekan
if(isset($_POST["search"])) {
    $siswa = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Latihan CRUD</title>
</head>
<body>

<a href="logout.php">Log Out</a>
<h1>Daftar Data Siswa</h1>

<a href="tambah.php">Tambah Data</a>

<form action="" method="post">
    <input type="text" name="keyword" size="25" autofocus placeholder="Search Data" autocomplete="off">
    <button type="submit" name="search">Search</button>
</form>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

<?php $i =1;?>
<?php foreach ($siswa as $row): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["alamat"];?></td>
        <td><?= $row["kelas"];?></td>
        <td><?= $row["jurusan"];?></td>
        <td><img src="img/<?= $row["foto"]; ?>" width="50"/></td>
        <td>
            <a href="edit.php?id=<?= $row["id"];?>" >edit</a> 
            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Anda Yakin?');">delete</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>

