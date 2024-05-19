<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
    <title>Xcashshop</title>
    <style>
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="nav-logo">
            <img src="gambar1.png" alt="Logo">
        </div>
        <!----------------------------- Form box ----------------------------------->
        
        <div class="form-box">
            <!------------------- login form -------------------------->
            <div class="login-container" id="login">
                <div class="top">
                    <h1>Masuk</h1>
                    <h5>Masuk menggunakan Akun terdaftar Kamu</h5>
                    <br>
                </div>
                <form action="prosesLogin.php" method="POST">
                    <?php if (isset($_GET['error'])): ?>
                        <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
                    <?php endif; ?>
                    <div class="input-box">
                        <input type="text" name="email" class="input-field" placeholder="Email">
                        <i class="bx bx-phone-call"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Masuk">
                    </div>
                </form>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check"> Ingatkan saya</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Lupa Password</a></label>
                    </div>
                </div>
                <div class="top">
                    <span>------------ Belum punya akun? ------------</span>
                </div>
                <div class="input-box">
                    <a href="register.php">Daftar Sekarang</a>
                </div>
                <!----------------------------- Footer ----------------------------------->
                <footer>
                    <br>
                    <p>&copy; 2023 Xcashshop. Semua Hak Cipta</p>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
