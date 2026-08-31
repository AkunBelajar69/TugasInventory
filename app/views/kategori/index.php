<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Catatanku</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "app/views/components/nav.php"; ?>
    
    <div class="main-content">
        <div class="container">
            <div class="page-header">
                <h1>🏷️ Manajemen Kategori</h1>
                <a href="index.php?act=kategori-tambah" class="btn btn-primary">➕ Tambah Kategori</a>
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
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Dibuat Oleh</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data_kategori)): ?>
                            <tr>
                                <td colspan="5" class="text-center">📭 Belum ada data kategori</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach($data_kategori as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><strong>🏷️ <?php echo htmlspecialchars($row['nama_kategori']); ?></strong></td>
                                <td>👤 <?php echo htmlspecialchars($row['nama_admin']); ?></td>
                                <td>🕒 <?php echo date('d/m/Y H:i', strtotime($row['created_at'])); ?></td>
                                <td class="action-buttons">
                                    <a href="index.php?act=kategori-edit&id=<?php echo $row['id']; ?>" class="btn-edit">✏️ Edit</a>
                                    <a href="index.php?act=kategori-hapus&id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus kategori <?php echo $row['nama_kategori']; ?>?')">🗑️ Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>