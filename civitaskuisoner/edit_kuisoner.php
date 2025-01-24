<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "Akses ditolak.";
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


    $sql = "SELECT * FROM kuisoner WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $kuisoner = $result->fetch_assoc();
    } else {
        echo "Kuisoner tidak ditemukan.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];


    $sql = "UPDATE kuisoner SET judul = ?, deskripsi = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $judul, $deskripsi, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Gagal memperbarui kuisoner.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Kuisoner</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <h1>Edit Kuisoner</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($kuisoner['id']) ?>">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($kuisoner['judul']) ?>" required>
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required><?= htmlspecialchars($kuisoner['deskripsi']) ?></textarea>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>