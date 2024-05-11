<?php

$conn = new mysqli("localhost", "root", "", "gdrive");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT email, pass FROM logincreds WHERE email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row["pass"]) {
            header("Location: home.html");
            exit;
        } else {
            echo "<p>Login failed. Please check your password.</p>";
        }
    } else {
        echo "<p>Login failed. User not found.</p>";
    }
} else {
    echo "<p>Error: Username or password not found in form data.</p>";
}

$conn->close();

?>