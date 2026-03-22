<?php
/*
Author: Philemon Kira IS3 
Date: 22nd March 2026
Unit: IS312 Web Application Development
*/

// Create database connection
$conn = new mysqli("localhost", "root", "", "FRU10");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data and store in variables
$code = isset($_POST['code']) ? trim($_POST['code']) : '';
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$duration = isset($_POST['duration']) ? trim($_POST['duration']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Program</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Program Result</h2>

<?php
// Validate on server side as well
if ($code === '' || $name === '' || $duration === '') {
    echo '<div class="error">Error: All fields are required.</div>';
} else {
    // Use prepared statement for safe insertion
    $stmt = $conn->prepare("INSERT INTO Program (ProgramCode, ProgramName, Duration) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sss", $code, $name, $duration);

        if ($stmt->execute()) {
            echo '<div class="success">Program added successfully.</div>';
        } else {
            echo '<div class="error">Error: ' . htmlspecialchars($stmt->error) . '</div>';
        }

        $stmt->close();
    } else {
        echo '<div class="error">Error preparing statement: ' . htmlspecialchars($conn->error) . '</div>';
    }
}

$conn->close();
?>

    <a href="new-program.html">Add Another Program</a>
    <a href="index.html">Back to Home</a>
</div>
</body>
</html>




