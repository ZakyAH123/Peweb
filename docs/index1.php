<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xcashop</title>
    <link rel="stylesheet" href="../css/styles1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="script.js"></script>
</head>
<body>
    <header>
    <nav class="navbar">
            <div class="navbar-left">
                <a href="#" class="menu-icon"><i data-feather="menu"></i></a>
                <a href="#" class="logo"><img src="../assets/xcashop.webp" alt="logo"></a>
                <p>Website Top Up Anti Buta Map, Tercepat Dan Terpercaya Di Indonesia.</p>
            
            </div>
            <div class="navbar-right">
                <i data-feather="log-in"></i>
                <?php if(isset($_SESSION['username'])): ?>
                    <a href="riwayat.php" id="login"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="http://localhost/Peweb/logins.php" id="login">Masuk/Daftar</a>
                <?php endif; ?>
            </div>
        </nav>
</nav>
   
    </header>
    <!-- <div class="sidebar" id="sidebar">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <a href="register.html" id="login"> Masuk/Daftar</a>
    </div> -->



    <section id="porm">
        <div class="rom">
            <div class="baner-img">
                    <a href="#"><img src="../assets/baner.webp" alt="Promotion 1"></a>
                <!-- Add more unique promotion items as needed -->
            </div>
        </div>
    </section>

    <section id="promo">
        <div class="container-promo">
            <h3>Hot Deals</h3>
            <div class="promotion-list">
                <div class="promotion-item">
                    <a href="#"><img src="../assets/1apa.jpg" alt="Promotion 1"></a>
                </div>
                <div class="promotion-item">
                    <a href="#"><img src="../assets/1apa.jpg" alt="Promotion 2"></a>
                </div>
                <div class="promotion-item">
                    <a href="#"><img src="../assets/1apa.jpg" alt="Promotion 2"></a>
                </div>
                <div class="promotion-item">
                    <a href="#"><img src="../assets/1apa.jpg" alt="Promotion 2"></a>
                </div>
                <!-- Add more unique promotion items as needed -->
            </div>
        </div>
    </section>

    <section id="topup">
        <div class="container">
            <div class="topup-grid">
                <div class="topup-item">
                    <a href="#"><img src="../assets/ngml.webp" alt="Mobile Legend"></a>
                    <div class="overlay">Mobile Legend</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/1.webp" alt="Weekly Diamond"></a>
                    <div class="overlay">Weekly Diamond</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/ff.webp" alt="Free Fire"></a>
                    <div class="overlay">Free Fire</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/pubg.webp" alt="PUBG Mobile"></a>
                    <div class="overlay">PUBG Mobile</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/hok.webp" alt="Honor Of Kings"></a>
                    <div class="overlay">Honor Of Kings</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/lol.webp" alt="League Of Legends"></a>
                    <div class="overlay">League Of Legends</div>
                </div>
                <div class="topup-item">
                    <a href="../tb/halaman2.html">
                        <img src="../assets/gi.webp" alt="Genshin Impact">
                        <div class="overlay">Genshin Impact</div>
                    </a>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/zepeto.webp" alt="Zepeto"></a>
                    <div class="overlay">Zepeto</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/hasr.webp" alt="Honkai Star Rail"></a>
                    <div class="overlay">Hongkai Star Rail</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/hi.webp" alt="Hongkai Impact 3rd"></a>
                    <div class="overlay">Hongkai Impact 3rd</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/valoranat.webp" alt="Valorant"></a>
                    <div class="overlay">Valorant</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/codm.webp" alt="Mobile Legend"></a>
                    <div class="overlay">COD Mobile</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/undawn.webp" alt="Mobile Legend"></a>
                    <div class="overlay">Undawn</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/aov.webp" alt="Mobile Legend"></a>
                    <div class="overlay">Arena Of Valor</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/supersus.webp" alt="Mobile Legend"></a>
                    <div class="overlay">Supersus</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/sausage.webp" alt="Mobile Legend"></a>
                    <div class="overlay">Sausage Party</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/eggy.webp" alt="Mobile Legend"></a>
                    <div class="overlay">Eggy Party</div>
                </div>
                <div class="topup-item">
                    <a href="#"><img src="../assets/fcmobile.webp" alt="Mobile Legend"></a>
                    <div class="overlay">FC Mobile</div>
                </div>
                
                <!-- Add more unique top-up items as needed -->
            </div>
        </div>
    </section>




    <footer>
        <div id="kaki">
            <div id="left">
                <img src="../assets/logofooter.webp" alt="logo">
                <div>
                    Top Up Game Favorit Kamu Di Xcashshop Agar Main Game Semakin Seru.
                        Pengiriman Cepat Dan Berbagai Methode Pembayaran Yang Lengkap.
                        Tersedia Berbagai Macam Game Populer Seperti Mobile Legends, Weekly Diamond Pass, 
                        PUBG Mobile, Valorant, Dragon Nest 2, Metal Slug, Fc Mobile, Zepeto, Super Sus, State Of Survival, 
                        Clash Of Clans, Brawl Starts, Free Fire, Garena Undawn, Ragnarok Origin, Genshin Impact, Seal M Sea, 
                        Ace Racer, Tower Of Fantasy, Wild Rift, Arena Of Valor, Call Of Duty Mobile, Sausage Man Dan Berbagai Game 
                        Lainnya Yang Tidak Kalah Seru Untuk Kamu Mainkan.
                </div>
            </div>

            <div id="newlist">
                <div class="lingling">
                    <h2>PETA SITUS</h2>  
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Semua Game</a></li>
                        <li><a href="#">Masuk</a></li>
                        <li><a href="#">Daftar</a></li>
                    </ul>
                </div>
                
                <div class="lingling">
                    <h2>TOP UP LAINNYA</h2>
                    <ul class="game-list">
                        <li><a href="#">Mobile Legends</a></li>
                        <li><a href="#">Free Fire</a></li>
                        <li><a href="#">PUBG Mobile</a></li>
                        <li><a href="#">Undawn</a></li>
                    </ul>
                </div>

                <div class="lingling">
                    <h2>IKUTI KAMI</h2>
                    <ul class="game-list">
                        <li><a href="#">IG</a></li>
                        <li><a href="#">TAKTIK</a></li>
                        <li><a href="#">TWITTER</a></li>
                        <li><a href="#">FACEBOOK</a></li>
                    </ul>
                </div>  

            </div>
            <!-- <div id="bayar">
                <h2>Payment Methods</h2>
                <img src="ovo.png" alt="OVO">
                <img src="ovo.png" alt="OVO">
                <img src="ovo.png" alt="OVO">
            </div> -->
        </div>

        <div id="copy">
            <hr>
            <div>
                <p>&copy; 2024 XCASHSHOP. All rights reserved.</p>
            </div>
        </div>
    </footer>



    <!-- <script src="/docs/script.js"></script> -->
    
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>
