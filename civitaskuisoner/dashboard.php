<?php
session_start();
include 'config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT * FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$user = $query->get_result()->fetch_assoc();

if (!$user) {
    echo "Error fetching user data.";
    exit;
}


$sql_kuisoner = "SELECT * FROM kuisoner WHERE created_by = ?";
$stmt = $conn->prepare($sql_kuisoner);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$kuisoner_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Civitas Kuisoner</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <header>
        <h1>Selamat datang, <?php echo htmlspecialchars($user['username']); ?>!</h1>
        <nav class="nav">
            <a href="tambah_kuisoner.php" class="button">Tambah Kuisoner</a>
            <a href="logout.php" class="button">Logout</a>
        </nav>
    </header>

    <main>
        <h2>Dashboard Anda</h2>
        <p>Selamat datang di Web Civitas Kuisoner. dibawah merupakan daftar kuisoner:</p>

        <?php if ($kuisoner_result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Link Google Form</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $kuisoner_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['judul']); ?></td>
                            <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                            <td><a href="<?php echo htmlspecialchars($row['google_form_link']); ?>" target="_blank">View</a></td>
                            <td>
                                <a href="edit_kuisoner.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="hapus_kuisoner.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this kuisoner?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada kuisoner</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Civitas Kuisoner</p>
    </footer>
</body>

</html>