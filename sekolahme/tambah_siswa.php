<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Query untuk menyimpan data
    $query = "INSERT INTO data_siswa (nama_siswa, alamat_siswa, agama_siswa, asal_sekolah) 
              VALUES ('$nama', '$alamat', '$agama', '$asal_sekolah')";

    if (mysqli_query($konek, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='data_siswa.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($konek);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #004080;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #003366;
        }
    </style>
</head>

<body>
    <main>
        <h2>Tambah Data Siswa</h2>
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="agama">Agama:</label>
            <select id="agama" name="agama" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Lainnya">Lainnya</option>
            </select>

            <label for="asal_sekolah">Asal Sekolah:</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" required>

            <button type="submit">Simpan</button>
        </form>
    </main>
</body>

</html>