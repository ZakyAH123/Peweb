<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gdrive";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count expired orders
$sql = "SELECT COUNT(*) AS count FROM riwayatbeli WHERE Statuss='Expired'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['count' => $row['count']]);
} else {
    echo json_encode(['count' => 0]);
}

// Close connection
$conn->close();
?>
