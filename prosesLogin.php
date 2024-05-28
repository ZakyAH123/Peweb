<?php

$conn = new mysqli("localhost", "root", "", "gdrive");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT email, pass FROM logincreds WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row["pass"]) {
            header("Location: http://localhost/Peweb/docs/index1.html");
            exit;
        } else {
            header("Location: logins.php?error=Username or password incorrect");
            exit;
        }
    } else {
        header("Location: logins.php?error=Username or password incorrect");
        exit;
    }
} else {
    header("Location: logins.php?error=Error: Username or password not found in form data.");
    exit;
}

$conn->close();

?>
