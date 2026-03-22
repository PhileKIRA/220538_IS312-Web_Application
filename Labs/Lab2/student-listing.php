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

// Retrieve all student details
$sql = "SELECT StudentNo, Firstname, Lastname, Gender, ContactNo, ProgramCode FROM Student";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Listing</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student Listing</h2>

    <table>
        <tr>
            <th>StudentNo</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>ContactNo</th>
            <th>ProgramCode</th>
        </tr>

        <?php
        // Display student details in tabular format
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['StudentNo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ContactNo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ProgramCode']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo '<tr><td colspan="6">No student records found.</td></tr>';
        }
        ?>
    </table>

    <a href="index.html">Back to Home</a>
</div>
</body>
</html>
<?php
$conn->close();
?>




