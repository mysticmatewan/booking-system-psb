<?php
session_start();

// Destroy the session to log the user out
session_unset();
session_destroy();

// Redirect after a delay (optional)
header("Refresh: 3; url=login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out...</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"><!-- MU TUBIK -->
</head>
<body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="logout-container">
    <h1 align="center">Logging Out...</h1>
    <p class="message" align="center">We are logging you out. Please wait...</p>
    <div class="loader"></div>
    <p class="redirect" align="center">You will be redirected shortly.</p>
</div>
</body>
</html>