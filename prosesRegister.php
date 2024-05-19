<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "gdrive";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$rePass = $conn->real_escape_string($_POST['rePass']);

if ($password !== $rePass) {
    header("Location: register.php?error=Passwords do not match.");
    exit();
}

$sql = "INSERT INTO logincreds (email, pass) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: register.php?success=Account created successfully.");
    exit();
} else {
    header("Location: register.php?error=Error: " . urlencode($conn->error));
    exit();
}

$conn->close();
?>