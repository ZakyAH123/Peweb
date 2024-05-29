<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="#" class="logo"><img src="../assets/xcashop.webp" alt="logo"></a>
                <p>Website Top Up Anti Buta Map, Tercepat Dan Terpercaya Di Indonesia.</p>
        
            </div>
        </nav>    
    </header>
    
    <br><br><br>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <div class="nav-links">
                    <a href="akun.html" class="nav-link">
                        <span class="icon">&#128100;</span>
                        <span class="link-text">Akun</span>
                    </a>
                    <a href="riwayat.php" class="nav-link">
                        <span class="icon">&#128179;</span>
                        <span class="link-text">Riwayat Transaksi</span>
                    </a>
                </div>
                <button class="logout-button">
                    <span class="icon">&#10162;</span>
                    <span class="link-text">Keluar</span>
                </button>
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
                        <input type="text" placeholder="Cari nomor pesanan">
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
            </tr>
        </thead>
        <tbody>
            <?php
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

            // Fetch data from the riwayatbeli table
            $sql = "SELECT NomorPesanan, Layanan, NamaBarang, Pembayaran, Statuss FROM riwayatbeli";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["NomorPesanan"] . "</td>";
                    echo "<td>" . $row["Layanan"] . "</td>";
                    echo "<td>" . $row["NamaBarang"] . "</td>";
                    echo "<td>" . $row["Pembayaran"] . "</td>";
                    echo "<td>" . $row["Statuss"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>


                <div class="pagination">
                    <button>Prev</button>
                    <button>Next</button>
                </div>
            </div>
        </main>
</body>
</html>