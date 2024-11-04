<!DOCTYPE html>
<html>
    <head>
        <title>Contoh List dengan HTML</title>
    </head>
    <body>
        <h2>Daftar Absensi Mahasiswa</h2>
        <ol>
            <li>Nama Mahasiswa ke-1</li>
            <li>Nama Mahasiswa ke-2</li>
            <li>Nama Mahasiswa ke-3</li>
            <li>Nama Mahasiswa ke-4</li>
            <li>Nama Mahasiswa ke-5</li>
            <li>Nama Mahasiswa ke-6</li>
            <li>Nama Mahasiswa ke-7</li>
            <li>Nama Mahasiswa ke-8</li>
            <li>Nama Mahasiswa ke-9</li>
            <li>Nama Mahasiswa ke-10</li>
        </ol>
        <h3>Daftar Absensi Mahasiswa (1000 Mahasiswa)</h3>
        <ol>
            <?php 
            for ($i = 1; $i <= 1000; $i++) {
                echo "<li>Nama Mahasiswa ke-$i</li>";
            }
            ?>
        </ol>
    </body>
</html>
