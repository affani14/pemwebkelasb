<!DOCTYPE html>
<html>

<head>
    <title>ST Sekolah | Edit Data Siswa</title>
</head>

<body>
    <h2>ST Sekolah | Edit Data Siswa</h2>
    <br />
    <a href="index.php">KEMBALI</a>
    <br />
    <br />

    <?php
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <form method="post" action="edit_aksi.php">
            <table>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $data['id']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td><input type="number" name="nis" value="<?php echo $data['nis']; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>