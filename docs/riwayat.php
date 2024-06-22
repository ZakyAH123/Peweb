<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gdrive";

// Handle the delete action before any HTML output
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['delete_nomor'])) {
        $nomorPesananToDelete = $_POST['delete_nomor'];
        $deleteSql = "DELETE FROM riwayatbeli WHERE NomorPesanan = ?";
        $stmt = $conn->prepare($deleteSql);
        $stmt->bind_param("s", $nomorPesananToDelete);

        if ($stmt->execute() === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $stmt->close();
    } elseif (isset($_POST['delete_all']) && $_POST['delete_all'] == 'true') {
        $deleteSql = "DELETE FROM riwayatbeli";

        if ($conn->query($deleteSql) === TRUE) {
            echo "All records deleted successfully";
        } else {
            echo "Error deleting records: " . $conn->error;
        }
    }

    $conn->close();

    // Refresh the page to reflect changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="15">
    <title>Xcashshop</title>
    <link rel="stylesheet" href="../css/styles2.css">
    <link rel="stylesheet" href="../css/styles3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="#" class="menu-icon"><i data-feather="menu"></i></a>
                <a href="index1.php" class="logo"><img src="../assets/xcashop.webp" alt="logo"></a>
                <p>Website Top Up Anti Buta Map, Tercepat Dan Terpercaya Di Indonesia.</p>
        
            </div>
            <style>
                .transaction-table tbody tr {
                    color: white;
                }

                .transaction-table {
                border-collapse: collapse;
                width: 100%;
                }

                .transaction-table, 
                .transaction-table th, 
                .transaction-table td {
                border: 1px solid grey;
                }

            </style>
        </nav>    
    </header>
    
    <br><br><br>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <div class="nav-links">
                    <a href="akun.php" class="nav-link">
                        <span class="icon">&#128100;</span>
                        <span class="link-text">Akun</span>
                    </a>
                    <a href="riwayat.php" class="nav-link">
                        <span class="icon">&#128179;</span>
                        <span class="link-text">Riwayat Transaksi</span>
                    </a>
                </div>
                <a href="logout.php" class="logout-button">
                    <span class="icon">&#10162;</span>
                    <span class="link-text">Keluar</span>
                </a>
            </nav>
        </aside>

        <main class="main-content">
            <div class="history">
                <div class="header">
                    <h4 class="title">Riwayat Transaksi</h4> <br>
                </div>
                <div class="filter">
                    <select id="status">
                        <option value="">Semua</option>
                        <option value="Belum Bayar">Belum Bayar</option>
                        <option value="Paid">Sudah Dibayar</option>
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Success">Success</option>
                        <option value="Expired">Expired</option>
                        <option value="Canceled">Canceled</option>
                        <option value="Refunded">Refunded</option>
                        <option value="Error">Error</option>
                    </select>
                    <div class="search-box">
                        <input type="text" id="search" placeholder="Cari nomor pesanan">
                        <button class="search-btn">🔍</button>
                    </div> 
                </div>

                <div class="table-container">
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>Nomor Pesanan</th>
                            <th>Layanan</th>
                            <th>Nama</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT NomorPesanan, Layanan, NamaBarang, Pembayaran, Statuss FROM riwayatbeli";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["NomorPesanan"] . "</td>";
                                    echo "<td>" . $row["Layanan"] . "</td>";
                                    echo "<td>" . $row["NamaBarang"] . "</td>";
                                    echo "<td>" . $row["Pembayaran"] . "</td>";
                                    echo "<td>" . $row["Statuss"] . "</td>";
                                    echo "<td>";
                                    if (strpos($row["Statuss"], 'Expired') !== false) {
                                        echo "<form method='post' action='' onsubmit='return confirm(\"Are you sure you want to delete this record?\");' style='display:inline;'>";
                                        echo "<input type='hidden' name='delete_nomor' value='" . $row["NomorPesanan"] . "'>";
                                        echo "<button type='submit'>Delete</button>";
                                        echo "</form>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No data found</td></tr>";
                            }
                            $conn->close();
                            ?>
                    </tbody>
                </table>
            </div>
                <form method="post" action="" onsubmit='return confirm("Are you sure you want to delete all records?");'>
                    <input type="hidden" name="delete_all" value="true">
                    <button type="submit">Delete All Records</button>
                </form>
            <div class="pagination">
                <button>Prev</button>
                <button>Next</button>
            </div>
        </div>
    </main>
    <script>
        function filterTable() {
            var status = document.getElementById("status").value.toLowerCase();
            var search = document.getElementById("search").value.toLowerCase();
            var table = document.getElementById("tableBody");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                var nomorPesanan = cells[0].textContent.toLowerCase();
                var statusText = cells[4].textContent.toLowerCase();
                
                var showRow = true;

                if (status && status !== statusText) {
                    showRow = false;
                }
                if (search && nomorPesanan.indexOf(search) === -1) {
                    showRow = false;
                }

                rows[i].style.display = showRow ? "" : "none";
            }
        }

        // Attach event listeners
        document.getElementById("status").addEventListener("change", filterTable);
        document.getElementById("search").addEventListener("input", filterTable);
    </script>
</body>
</html>