<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Unipdu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #004080;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 20px;
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            margin: 0 0 15px;
        }

        a {
            display: block;
            padding: 10px 15px;
            margin: 10px 0;
            text-decoration: none;
            color: #004080;
            background-color: #e6f0ff;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #004080;
            color: #fff;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <header>
        <h1>Sistem Informasi Unipdu</h1>
        <h2>Universitas Darul Ulum</h2>
    </header>
    <main>
        <a href="data_siswa.php">Daftar Siswa</a>
        <a href="tambah_siswa.php">Pendaftaran</a>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?>Unipdu. All Rights Reserved.
    </footer>
</body>

</html>