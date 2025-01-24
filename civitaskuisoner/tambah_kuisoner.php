<?php
session_start();
include 'config.php';


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Anda tidak memiliki akses.";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $google_form_link = $_POST['google_form_link']; // Link Google Form


    if (empty($judul) || empty($deskripsi) || empty($google_form_link)) {
        echo "Semua field harus diisi!";
        exit();
    }


    $stmt = $conn->prepare("INSERT INTO kuisoner (judul, deskripsi, google_form_link, created_by) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $judul, $deskripsi, $google_form_link, $_SESSION['user_id']);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kuisoner</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <h1>Tambah Kuisoner Baru</h1>
    <form method="POST">
        <label>Judul:</label>
        <input type="text" name="judul" required>
        <br>
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>
        <br>
        <label>Link Google Form:</label>
        <input type="url" name="google_form_link" required>
        <br>
        <button type="submit">Tambah</button>
    </form>

    <p><a href="https://forms.gle/your-google-form-link" target="_blank">Isi Google Form</a></p> <!-- Tautan Google Form -->
</body>

</html>