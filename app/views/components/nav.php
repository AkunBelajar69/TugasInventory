<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand">
            <a href="index.php?act=dashboard">📝 Catatanku</a>
        </div>
        
        <div class="nav-menu">
            <a href="index.php?act=dashboard" class="nav-link">🏠 Dashboard</a>
            <a href="index.php?act=catatan" class="nav-link">📋 Catatan</a>
            <a href="index.php?act=kategori" class="nav-link">🏷️ Kategori</a>
            <span class="nav-user">👤 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="index.php?act=logout" class="btn-logout">🚪 Logout</a>
        </div>
    </div>
</nav>