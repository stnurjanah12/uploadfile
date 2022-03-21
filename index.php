<?php

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari di klik maka akan menampilkan hasil data yang dicari
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Data Mahasiswa</title>
</head>

<body bgcolor="purple">

    <h1 align=center>Daftar Mahasiswa</h1>

    <section>
    <center><button type="button" class="btn btn-primary">
    <a href="tambah.php">Tambah Data</a>
    </button>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Cari data yang diinginkan.." autocomplete="off">
        <button type="submit" name="cari"> Search</button>
    </form></center>
    <br>
</section>
    <br><br>

    <table align="center" border="1" cellpadding="10" cellspacing="0">
        <thead style="background-color: orange">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Photo</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
        </thead>
        <thead style="background-color: white">

                <td> <?= $i; ?> </td>

                <td>
                    <a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data');  ">Hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["npm"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
                <td><?php echo $row["email"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        </thead>

    </table></center>

</body>

</html>