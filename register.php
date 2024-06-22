<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stylesLogReg.css">
    <title>Xcashshop</title>
    <style>
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="nav-logo">
            <img src="assets/gambar1.png" alt="Logo">
        </div>
        <!----------------------------- Form box ----------------------------------->  
        <form action="prosesRegister.php" method="POST">
            <div class="form-box">
                <!------------------- registration form -------------------------->
                <div class="register-container" id="register">
                    <div class="top">
                        <h1>Daftar</h1>
                        <h5> Mohon masukan informasi pendaftaran dengan valid</h5>
                        <br>
                    </div>
                    <?php if (isset($_GET['error'])): ?>
                        <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
                    <?php elseif (isset($_GET['success'])): ?>
                        <p class="success"><?= htmlspecialchars($_GET['success']) ?></p>
                    <?php endif; ?>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" name="NamaDepan" class="input-field" placeholder="Nama Depan">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" name="NamaBelakang" class="input-field" placeholder="Nama Belakang">
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email">
                        <i class="bx bx-phone-call"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="rePass" class="input-field" placeholder="Konfirmasi Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Daftar">
                    </div>
                    <div class="top">
                        <span>------------ Sudah punya akun? ------------</span>
                    </div>
                    <div class="input-box">
                        <a href="logins.php">Masuk Sekarang</a>
                    </div>
                    <!----------------------------- Footer ----------------------------------->
                    <footer>
                        <br> 
                        <p>&copy; 2023 Xcashshop. Semua Hak Cipta</p>
                    </footer>
                </div> 
            </div>
        </form>  
    </div>
</body>
</html>
