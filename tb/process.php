<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedNominal = $_POST['selected_nominal'];
    $selectedPaymentMethod = $_POST['selected_payment_method'];

    if (empty($selectedNominal) || empty($selectedPaymentMethod)) {
        die("Both selected nominal and selected payment method are required.");
    }

    // Generate a random 5-digit number for NomorPesanan
    $nomorPesanan = rand(10000, 99999); // Generates a random number between 10000 and 99999


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

    $layanan = "Genshin Impact"; // Constant value for Layanan column
    $status = "Paid"; // Constant value for Status column

    $sql = "INSERT INTO riwayatbeli (NomorPesanan, Layanan, NamaBarang, Pembayaran, Statuss) VALUES ('$nomorPesanan', '$layanan', '$selectedNominal', '$selectedPaymentMethod', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/Peweb/docs/riwayat.php"); // Redirect to the home page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
