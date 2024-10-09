<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'booking-system-psb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM bookings WHERE user_id='$user_id' ORDER BY date DESC, time DESC";
$result = $conn->query($sql);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings - PSB UUM</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <style>
        /* KALU ADA, ADALAH */
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
        <h2>Your Bookings</h2>

        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <thead>
                        <tr>
                            <th>Facility</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['facility']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        <td>{$row['phone']}</td>
                        <td><span class='btn'>Confirmed</span></td>
                    </tr>";
            }
            
            echo "</tbody></table>";
        } else {
            echo "<p>No bookings found. <a href='index.php'>Book a facility now</a>.</p>";
        }
        ?>
        
        <a href="index.php" class="btn">Back to Booking</a>
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

<?php
$conn->close();
?>