<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'booking-system-psb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<br><p class='success-message'>Account created successfully! <a href='login.php'>Login here</a></p><br>";
    } else {
        echo "<br><p class='error-message'>Error: " . $conn->error . "</p><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PSB UUM</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <style>
        /* GI MANA? DAFTAR DULU DEH */
    </style>
</head>
<body>
<section class="banner">
    <img src="https://wallpapercat.com/w/full/8/f/4/914063-1920x1080-desktop-full-hd-library-wallpaper-photo.jpg" alt="Banner Image" class="banner-img">
    <div class="banner-content">
        <h1>Welcome to Perpustakaan Sultanah Bahiyah UUM</h1>
        <p class="banner-description">Your gateway to knowledge and learning</p>
        <a href="https://library.uum.edu.my/?" class="btn-banner">Learn More</a>
    </div>
</section>
<nav class="navbar">
    <div class="logo">
        <a href="index.php" class="cancel-btn">Booking</a>
    </div>
</nav>
<br>
    <div class="container">
        <h2>Create an Account</h2>
        <form method="post" action="register.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
        </form>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="footer">
    <div class="footer-column">
     <p>Mail us for enquiries📧<a href="mailto:uumlib@uum.edu.my" class="cancel-btn">uumlib@uum.edu.my</a></p>    
    </div>
    <div class="footer-column">
     <p><strong>PSB UUM Online Booking System<strong></p>  
    </div>
    <div class="footer-column">
     <p><strong>All Rights Reserved &copy; Perpustakaan Sultanah Bahiyah UUM / Powered by <strong><a href ="http://rimalibs.netlify.app" class="cancel-btn">Rimalibs</a></p>  
    </div>
</footer>
</body>
</html>