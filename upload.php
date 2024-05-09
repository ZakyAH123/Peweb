<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">Upload</button>
    </form>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gdrive";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        if($fileError === 0) {
            $sql = "INSERT INTO filees (nama) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $fileName);
            if ($stmt->execute()) {
                header("Location: home.html");
                exit();
            } else {
                echo "Error uploading file: " . $stmt->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }
    $conn->close();
    ?>
</body>
</html>
