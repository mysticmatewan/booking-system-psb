<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Proceed with the booking process if the user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'booking-system-psb');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = $_SESSION['user_id'];
    $facility = $_POST['facility'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];

    // Insert booking details into the database
    $sql = "INSERT INTO bookings (user_id, facility, date, time, phone) 
            VALUES ('$user_id', '$facility', '$date', '$time', '$phone')";

    if ($conn->query($sql) === TRUE) {
        $message = "Booking successful!";
    } else {
        $message = "Error: " . $conn->error;
    }

    $conn->close();
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in
    echo "<h1>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h1>"; // Sanitizing for security
    echo "<a href='logout.php'>Log Off</a>";  // Log off button
} else {
    // User is not logged in
    echo "<h1>Please log in to book.</h1>";
    echo "<a href='login.php'>Login Page</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Facility - PSB UUM</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <style>
        /* BAN PRAONG ROCKS */
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
    <div class="book-container">
    <h2>Book a Facility</h2>

    <br>
    <?php if (isset($message)): ?>
        <p class="success-message" align="center"><?php echo $message; ?></p>
    <?php endif; ?>
    <br>

    <form method="POST" action="index.php">
        <label for="facility">Select Facility</label>
        <select name="facility" required>
            <option value="">Select a facility</option>
            <option value="Room 1">Carrel Room</option>
            <option value="Room 2">Auditorium 1</option>
            <option value="Conference Hall">Auditorium 2</option>
        </select>

        <label for="date">Date</label>
        <input type="date" name="date" required>

        <label for="time">Time</label>
        <input type="time" name="time" required>

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

        <button type="submit" class="btn">Book Now</button>
    </form>

    <a href="view_bookings.php" class="btn">View Your Bookings</a>
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