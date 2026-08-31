<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan - Catatanku</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "app/views/components/nav.php"; ?>
    
    <div class="main-content">
        <div class="container">
            <div class="page-header">
                <h1>✏️ Edit Catatan</h1>
                <a href="index.php?act=dashboard" class="btn btn-secondary">← Kembali ke Dashboard</a>
            </div>
            
            <?php if (isset($_SESSION['error_msg'])): ?>
                <div class="alert alert-error">
                    <?php echo $_SESSION['error_msg']; ?>
                    <?php unset($_SESSION['error_msg']); ?>
                </div>
            <?php endif; ?>
            
            <div class="form-container">
                <form action="index.php?act=catatan-edit-proses" method="POST" class="form">
                    <input type="hidden" name="id" value="<?php echo $catatan['id']; ?>">
                    
                    <div class="form-group">
                        <label for="judul">Judul Catatan <span class="required">*</span></label>
                        <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($catatan['judul']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select id="kategori_id" name="kategori_id">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach($data_kategori as $kategori): ?>
                            <option value="<?php echo $kategori['id']; ?>" <?php echo ($kategori['id'] == $catatan['kategori_id']) ? 'selected' : ''; ?>>
                                🏷️ <?php echo htmlspecialchars($kategori['nama_kategori']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="isi">Isi Catatan</label>
                        <textarea id="isi" name="isi" rows="12"><?php echo htmlspecialchars($catatan['isi']); ?></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">🔄 Update Catatan</button>
                        <a href="index.php?act=dashboard" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>