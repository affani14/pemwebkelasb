<?php
include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: persian.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash the password using SHA-256

    $sql = "SELECT * FROM users WHERE email = '$email' AND password_hash = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: sukses_login.php");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Niagahoster Tutorial</title>
</head>
<body>
    <div class="container">
        <form action="process_login.php" method="POST" class="login-form">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Login</p>

            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>

            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>

            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>

            <p class="login-register-text">
                Anda belum punya akun? <a href="register.php">Register</a>
            </p>
        </form>
    </div>
</body>
</html>
