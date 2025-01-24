<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$kuisonerQuery = "SELECT k.*, u.username, u.profile_picture 
                  FROM kuisoner k 
                  JOIN users u ON k.created_by = u.id 
                  ORDER BY k.created_at DESC";
$kuisonerResult = $conn->query($kuisonerQuery);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>
        <nav>

            <a href="tambah_kuisoner.php">Tambah Kuisoner</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <table>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Dibuat Oleh</th>
            <th>Tanggal</th>
            <th>Link</th>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
        <?php while ($row = $kuisonerResult->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                <td>
                    <img src="uploads/<?= htmlspecialchars($row['profile_picture']) ?>" alt="Profile Picture" width="30">
                    <?= htmlspecialchars($row['username']) ?>
                </td>
                <td><?= htmlspecialchars($row['created_at']) ?></td>
                <td>
                    <?php if (!empty($row['google_form_link'])): ?>
                        <a href="<?= htmlspecialchars($row['google_form_link']) ?>" target="_blank">Isi Survey</a>
                    <?php else: ?>
                        Tidak ada link
                    <?php endif; ?>
                </td>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <td>
                        <a href="edit_kuisoner.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete_kuisoner.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>