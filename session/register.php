<?php
include "config.php";
session_start();

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = hash('sha256', $_POST["password"]); // Hash the input password using SHA-256
    $cpassword = hash('sha256', $_POST["cpassword"]); // Hash the input confirm password using SHA-256

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script>alert('Woops! Email sudah terdaftar.');</script>";
        } else {
            $sql = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!');</script>";
                $_POST["username"] = "";
                $_POST["email"] = "";
                $_POST["password"] = "";
                $_POST["cpassword"] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.');</script>";
            }
        }
    } else {
        echo "<script>alert('Password tidak sesuai.');</script>";
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
    <title>Mahasiswa Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" 
                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" 
                       required>
            </div>
            
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" 
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                       required>
            </div>
            
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login</a></p>
        </form>
    </div>
</body>
</html>
