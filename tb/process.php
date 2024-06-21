<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $selectedNominal = $_POST['selected_nominal'];
    $selectedPaymentMethod = $_POST['selected_payment_method'];
    $sourceFile = $_POST['source_file'];

    if (empty($selectedNominal) || empty($selectedPaymentMethod)) {
        die("Both selected nominal and selected payment method are required.");
    }

    $nomorPesanan = rand(10000, 99999);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gdrive";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Derive service name from the source file name
    $layanan = ucfirst(str_replace('_', ' ', basename($sourceFile, ".html")));
    $status = "Pending";

    $stmt = $conn->prepare("INSERT INTO riwayatbeli (UserID, NomorPesanan, Layanan, NamaBarang, Pembayaran, Statuss) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $user_id, $nomorPesanan, $layanan, $selectedNominal, $selectedPaymentMethod, $status);

    if ($stmt->execute() === TRUE) {
        $stmt->close();
        $conn->close();
        $eventQuery = "
        CREATE EVENT update_status_event
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 10 SECOND
        DO
        BEGIN
            UPDATE riwayatbeli SET Statuss = 'Expired' WHERE NomorPesanan = $nomorPesanan;
        END;
        ";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->query($eventQuery) === TRUE) {
            header("Location: ../docs/riwayat.php?");
            exit();
        } else {
            echo "Error creating event: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
