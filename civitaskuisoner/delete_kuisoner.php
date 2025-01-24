<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "Akses ditolak.";
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


    $sql = "DELETE FROM kuisoner WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Gagal menghapus kuisoner.";
    }
} else {
    echo "ID kuisoner tidak ditemukan.";
}
