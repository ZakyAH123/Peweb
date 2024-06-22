<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xcashshop</title>
    <link rel="stylesheet" href="../css/styles2.css">
    <!-- <link rel="stylesheet" href="../css/styles1.css"> -->
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
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-info">
                        <?php if(isset($_SESSION['username'])): ?>
                            <div class="profile-img-container">
                                <img alt="Profile Image" src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['username']); ?>&background=707feb&color=fff" class="profile-img">
                            </div>
                            <div class="profile-text">
                                <h3><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                                <p>Non Membership <span class="membership-icon">&#128736;</span></p>
                            </div> 
                        <?php endif; ?>
                    </div>

                    <button type="button" class="edit-button">
                        <span class="edit-icon">&#128100;</span>
                        <span class="edit-text">Edit Profile</span>
                    </button>
                </div>
                <hr>
                <div class="profile-contact">
                    <span class="contact-icon">&#128241;</span>
                    <p>08990093647</p>
                </div>
            </div>
            <br>
            <div class="grid-container">
                <div class="balance-card">
                    <div class="balance-info">
                        <p class="balance-label">Saldo Xidr</p>
                        <h3 class="balance-amount">Rp 0,-</h3>
                    </div>
                    <div class="balance-actions">
                        <!-- Add any additional actions here -->
                    </div>
                </div>
            </div>
        
            <h3 class="section-title">Pesanan Saya</h3>
            <div class="orders-card">
                <div class="order-item">
                    <h3 class="order-count">0</h3>
                    <p class="order-label">Belum Bayar</p>
                </div>
                <div class="order-item">
                    <h3 class="order-count">0</h3>
                    <p class="order-label">Pending</p>
                </div>
                <div class="order-item">
                    <h3 class="order-count">0</h3>
                    <p class="order-label">Success</p>
                </div>
                <div class="order-item">
                    <h3 class="order-count" id="expired-orders-count">0</h3>
                    <p class="order-label">Expired</p>
                </div>
            </div>
        </main>    
        <script>
            async function fetchExpiredOrdersCount() {
                try {
                    const response = await fetch('Total.php');
                    const data = await response.json();
                    document.getElementById('expired-orders-count').textContent = data.count;
                } catch (error) {
                    console.error('Error fetching expired orders count:', error);
                }
            }
            document.addEventListener('DOMContentLoaded', fetchExpiredOrdersCount);
        </script>
</body>
</html>