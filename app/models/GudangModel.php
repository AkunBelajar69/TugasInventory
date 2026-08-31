<?php
class GudangModel {
    private $connect;
    private $table_name = "gudang";

    public function __construct($db) {
        $this->connect = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nama_gudang ASC";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_gudang, $lokasi) {
        $query = "INSERT INTO " . $this->table_name . " (nama_gudang, lokasi) VALUES (:nama_gudang, :lokasi)";
        $stmt = $this->connect->prepare($query);

        $nama_gudang = htmlspecialchars(strip_tags($nama_gudang));
        $lokasi = htmlspecialchars(strip_tags($lokasi));

        $stmt->bindParam(":nama_gudang", $nama_gudang);
        $stmt->bindParam(":lokasi", $lokasi);

        return $stmt->execute();
    }

    public function update($id, $nama_gudang, $lokasi) {
        $query = "UPDATE " . $this->table_name . " SET nama_gudang = :nama_gudang, lokasi = :lokasi WHERE id = :id";
        $stmt = $this->connect->prepare($query);

        $nama_gudang = htmlspecialchars(strip_tags($nama_gudang));
        $lokasi = htmlspecialchars(strip_tags($lokasi));

        $stmt->bindParam(":nama_gudang", $nama_gudang);
        $stmt->bindParam(":lokasi", $lokasi);
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
