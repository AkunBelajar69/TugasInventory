<?php
class InventoryModel {
    private $connect;
    private $table_name = "inventory";

    public function __construct($db) {
        $this->connect = $db;
    }

    // ambil semua barang, join ke gudang & vendor supaya bisa tampilkan nama
    // kalau $keyword diisi, dipakai untuk cari nama_barang / jenis_barang / serial_number
    public function getAll($keyword = null) {
        $query = "SELECT inventory.*, gudang.nama_gudang, vendor.nama AS nama_vendor
                  FROM " . $this->table_name . "
                  JOIN gudang ON inventory.gudang_id = gudang.id
                  JOIN vendor ON inventory.vendor_id = vendor.id";

        if (!empty($keyword)) {
            $query .= " WHERE inventory.nama_barang LIKE :keyword
                        OR inventory.jenis_barang LIKE :keyword
                        OR inventory.serial_number LIKE :keyword";
        }
        $query .= " ORDER BY inventory.nama_barang ASC";

        $stmt = $this->connect->prepare($query);
        if (!empty($keyword)) {
            $like = "%" . $keyword . "%";
            $stmt->bindParam(":keyword", $like);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT inventory.*, gudang.nama_gudang, vendor.nama AS nama_vendor
                  FROM " . $this->table_name . "
                  JOIN gudang ON inventory.gudang_id = gudang.id
                  JOIN vendor ON inventory.vendor_id = vendor.id
                  WHERE inventory.id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // dipakai buat cek berapa barang yang stoknya sudah habis, untuk alert di admin
    public function getStokHabis() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE kuantitas = 0";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nama_barang, $jenis_barang, $kuantitas, $harga, $serial_number, $gudang_id, $vendor_id) {
        $query = "INSERT INTO " . $this->table_name . "
                  (nama_barang, jenis_barang, kuantitas, harga, serial_number, gudang_id, vendor_id)
                  VALUES (:nama_barang, :jenis_barang, :kuantitas, :harga, :serial_number, :gudang_id, :vendor_id)";
        $stmt = $this->connect->prepare($query);

        $nama_barang = htmlspecialchars(strip_tags($nama_barang));
        $jenis_barang = htmlspecialchars(strip_tags($jenis_barang));
        $serial_number = htmlspecialchars(strip_tags($serial_number));

        $stmt->bindParam(":nama_barang", $nama_barang);
        $stmt->bindParam(":jenis_barang", $jenis_barang);
        $stmt->bindParam(":kuantitas", $kuantitas);
        $stmt->bindParam(":harga", $harga);
        $stmt->bindParam(":serial_number", $serial_number);
        $stmt->bindParam(":gudang_id", $gudang_id);
        $stmt->bindParam(":vendor_id", $vendor_id);

        return $stmt->execute();
    }

    public function update($id, $nama_barang, $jenis_barang, $kuantitas, $harga, $serial_number, $gudang_id, $vendor_id) {
        $query = "UPDATE " . $this->table_name . " SET
                  nama_barang = :nama_barang,
                  jenis_barang = :jenis_barang,
                  kuantitas = :kuantitas,
                  harga = :harga,
                  serial_number = :serial_number,
                  gudang_id = :gudang_id,
                  vendor_id = :vendor_id
                  WHERE id = :id";
        $stmt = $this->connect->prepare($query);

        $nama_barang = htmlspecialchars(strip_tags($nama_barang));
        $jenis_barang = htmlspecialchars(strip_tags($jenis_barang));
        $serial_number = htmlspecialchars(strip_tags($serial_number));

        $stmt->bindParam(":nama_barang", $nama_barang);
        $stmt->bindParam(":jenis_barang", $jenis_barang);
        $stmt->bindParam(":kuantitas", $kuantitas);
        $stmt->bindParam(":harga", $harga);
        $stmt->bindParam(":serial_number", $serial_number);
        $stmt->bindParam(":gudang_id", $gudang_id);
        $stmt->bindParam(":vendor_id", $vendor_id);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
