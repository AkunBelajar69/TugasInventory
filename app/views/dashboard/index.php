<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Catatanku</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "app/views/components/nav.php"; ?>
    
    <div class="main-content">
        <div class="container">
            <div class="dashboard-header">
                <div>
                    <h1>Dashboard</h1>
                    <p style="color: var(--gray); margin-top: 0.5rem;">Selamat datang kembali, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! 👋</p>
                </div>
                <a href="index.php?act=catatan-tambah" class="btn btn-primary">➕ Tambah Catatan Baru</a>
            </div>
            
            <?php if (isset($_SESSION['success_msg'])): ?>
                <div class="alert alert-success">
                    <span>✅ <?php echo $_SESSION['success_msg']; ?></span>
                    <button onclick="this.parentElement.style.display='none'" style="background: none; border: none; color: inherit; cursor: pointer; font-size: 1.2rem;">&times;</button>
                    <?php unset($_SESSION['success_msg']); ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error_msg'])): ?>
                <div class="alert alert-error">
                    <span>❌ <?php echo $_SESSION['error_msg']; ?></span>
                    <button onclick="this.parentElement.style.display='none'" style="background: none; border: none; color: inherit; cursor: pointer; font-size: 1.2rem;">&times;</button>
                    <?php unset($_SESSION['error_msg']); ?>
                </div>
            <?php endif; ?>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Catatan</h3>
                    <p class="stat-number"><?php echo $total_catatan; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Terakhir Login</h3>
                    <p class="stat-date"><?php echo date('d/m/Y H:i', $_SESSION['login_time']); ?></p>
                </div>
            </div>
            
            <div class="dashboard-catatan">
                <div class="section-header">
                    <h2>📚 Daftar Semua Catatan</h2>
                    <span class="total-catatan"><?php echo $total_catatan; ?> Catatan</span>
                </div>
                
                <?php if (empty($data_catatan)): ?>
                    <div class="empty-state">
                        <p>📭 Belum ada catatan yang dibuat.</p>
                        <p class="empty-state-hint">Mulai buat catatan pertamamu sekarang!</p>
                        <a href="index.php?act=catatan-tambah" class="btn btn-primary" style="margin-top: 1rem;">➕ Buat Catatan</a>
                    </div>
                <?php else: ?>
                    <div class="catatan-grid">
                        <?php foreach($data_catatan as $row): ?>
                        <div class="catatan-card">
                            <div class="catatan-header">
                                <h3><?php echo htmlspecialchars($row['judul']); ?></h3>
                                <span class="catatan-kategori"><?php echo htmlspecialchars($row['nama_kategori'] ?? '📌 Tanpa Kategori'); ?></span>
                            </div>
                            <div class="catatan-meta">
                                <span>👤 <?php echo htmlspecialchars($row['nama_admin']); ?></span>
                                <span>🕒 <?php echo date('d/m/Y H:i', strtotime($row['created_at'])); ?></span>
                            </div>
                            <div class="catatan-isi">
                                <?php 
                                $isi = htmlspecialchars($row['isi']);
                                echo nl2br(substr($isi, 0, 200));
                                if (strlen($isi) > 200) echo '...';
                                ?>
                            </div>
                            <div class="catatan-actions">
                                <a href="index.php?act=catatan-edit&id=<?php echo $row['id']; ?>" class="btn-edit">✏️ Edit</a>
                                <a href="index.php?act=catatan-hapus&id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus catatan ini?')">🗑️ Hapus</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>