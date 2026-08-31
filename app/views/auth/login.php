<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Catatanku</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-card">
            <h2>🔐 Login Admin</h2>
            
            <?php if(isset($_SESSION['success_msg'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success_msg']; ?>
                    <?php unset($_SESSION['success_msg']); ?>
                </div>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['error_msg'])): ?>
                <div class="alert alert-error">
                    <?php echo $_SESSION['error_msg']; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                </div>
            <?php endif; ?>
            
            <form action="index.php?act=login-process" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-full">Login</button>
            </form>
            
            <p class="auth-link">
                Belum punya akun? <a href="index.php?act=register">Register</a>
            </p>
        </div>
    </div>
</body>
</html>