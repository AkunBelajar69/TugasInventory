<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Catatanku</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-card">
            <h2>📝 Register Admin</h2>
            
            <?php if(isset($_SESSION['error_msg'])): ?>
                <div class="alert alert-error">
                    <?php echo $_SESSION['error_msg']; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                </div>
            <?php endif; ?>
            
            <form action="index.php?act=register-process" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password <span class="required">(min. 6 karakter)</span></label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" minlength="6" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-full">Register</button>
            </form>
            
            <p class="auth-link">
                Sudah punya akun? <a href="index.php">Login</a>
            </p>
        </div>
    </div>
</body>
</html>