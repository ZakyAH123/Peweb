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

    $layanan = "Genshin Impact"; 
    $status = "Pending"; 

    $stmt = $conn->prepare("INSERT INTO riwayatbeli (NomorPesanan, Layanan, NamaBarang, Pembayaran, Statuss) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $nomorPesanan, $layanan, $selectedNominal, $selectedPaymentMethod, $status);

    if ($stmt->execute() === TRUE) {
        $stmt->close();
        $conn->close();

        // Create an event to update the Statuss column after 5 seconds
        $eventQuery = "
        CREATE EVENT update_status_event
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 5 SECOND
        DO
        UPDATE riwayatbeli SET Statuss = 'Updated' WHERE NomorPesanan = $nomorPesanan;
        ";

        // Reconnect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Execute the event query
        if ($conn->query($eventQuery) === TRUE) {
            header("Location: ../docs/riwayat.php?");
            exit();
        } else {
            echo "Error creating event: " . $conn->error;
        }

        // Close the connection
        $conn->close();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
