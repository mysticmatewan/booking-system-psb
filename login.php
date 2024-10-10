<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PSB UUM</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <style>
        /* LOGIN DULU */
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
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Redirect to booking page if already logged in
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'psb-uum-online-booking-system');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // Redirect to booking page after login
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in
    echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
    echo "<a href='logout.php'>Log Off</a>";  // Log off button
} else {
    // User is not logged in
    echo "<h1>Please log in to book.</h1>";
    echo "<a href='login.php'>Login Page</a>";
}
?>
<br>
    <div class="login-container">
        <h2>Login to Your Account</h2>

        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <input type="email" class="input-field" name="email" placeholder="Enter your email" required>
            <input type="password" class="input-field" name="password" placeholder="Enter your password" required>
            <button type="submit" class="btn">Login</button>
        </form>
<br>
        <p class="register-link">Don't have an account? <a href="register.php">Create one here</a></p>
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