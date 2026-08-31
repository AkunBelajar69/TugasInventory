CREATE DATABASE IF NOT EXISTS inventory_app;
USE inventory_app;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kontak VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE gudang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_gudang VARCHAR(100) NOT NULL,
    lokasi VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vendor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kontak VARCHAR(30) NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    jenis_barang VARCHAR(100) NOT NULL,
    kuantitas INT NOT NULL DEFAULT 0,
    harga DECIMAL(12,2) NOT NULL DEFAULT 0,
    serial_number VARCHAR(100) NOT NULL UNIQUE,
    gudang_id INT NOT NULL,
    vendor_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (gudang_id) REFERENCES gudang(id) ON DELETE CASCADE,
    FOREIGN KEY (vendor_id) REFERENCES vendor(id) ON DELETE CASCADE
);

-- Contoh data (opsional, boleh dihapus)
INSERT INTO admin (nama, kontak, email) VALUES
('Budi Santoso', '081234567890', 'budi@gudangku.com'),
('Siti Rahmawati', '081298765432', 'siti@gudangku.com');

INSERT INTO gudang (nama_gudang, lokasi) VALUES
('Gudang Pusat', 'Jl. Industri No. 1, Jakarta'),
('Gudang Cabang Bandung', 'Jl. Soekarno Hatta No. 20, Bandung'),
('Gudang Cabang Surabaya', 'Jl. Rungkut Industri No. 5, Surabaya'),
('Gudang Cabang Medan', 'Jl. Gatot Subroto No. 88, Medan');

INSERT INTO vendor (nama, kontak, nama_barang) VALUES
('CV Sumber Makmur', '081122334455', 'Kabel USB'),
('PT Elektronik Jaya', '081199887766', 'Charger HP'),
('CV Mitra Komputer', '081155667788', 'Aksesoris Komputer'),
('PT Alat Tulis Nusantara', '081166778899', 'Alat Tulis Kantor'),
('CV Furniture Kantor', '081177889900', 'Perabot Kantor');

INSERT INTO inventory (nama_barang, jenis_barang, kuantitas, harga, serial_number, gudang_id, vendor_id) VALUES
('Kabel USB Type-C', 'Aksesoris', 50, 25000, 'SN-0001', 1, 1),
('Charger HP 18W', 'Elektronik', 0, 75000, 'SN-0002', 2, 2),
('Mouse Wireless', 'Aksesoris Komputer', 30, 95000, 'SN-0003', 1, 3),
('Keyboard Mechanical', 'Aksesoris Komputer', 15, 350000, 'SN-0004', 3, 3),
('Pulpen Pilot 0.5', 'Alat Tulis', 200, 5000, 'SN-0005', 1, 4),
('Kertas HVS A4 (rim)', 'Alat Tulis', 0, 48000, 'SN-0006', 4, 4),
('Meja Kantor Minimalis', 'Perabot Kantor', 8, 850000, 'SN-0007', 2, 5),
('Kursi Kantor Ergonomis', 'Perabot Kantor', 12, 620000, 'SN-0008', 3, 5),
('Powerbank 10000mAh', 'Elektronik', 25, 150000, 'SN-0009', 4, 2),
('Flashdisk 32GB', 'Aksesoris Komputer', 0, 65000, 'SN-0010', 1, 3);
