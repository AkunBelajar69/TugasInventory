<?php
class VendorModel {
    private $connect;
    private $table_name = "vendor";

    public function __construct($db) {
        $this->connect = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nama ASC";
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

    public function create($nama, $kontak, $nama_barang) {
        $query = "INSERT INTO " . $this->table_name . " (nama, kontak, nama_barang) VALUES (:nama, :kontak, :nama_barang)";
        $stmt = $this->connect->prepare($query);

        $nama = htmlspecialchars(strip_tags($nama));
        $kontak = htmlspecialchars(strip_tags($kontak));
        $nama_barang = htmlspecialchars(strip_tags($nama_barang));

        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":kontak", $kontak);
        $stmt->bindParam(":nama_barang", $nama_barang);

        return $stmt->execute();
    }

    public function update($id, $nama, $kontak, $nama_barang) {
        $query = "UPDATE " . $this->table_name . " SET nama = :nama, kontak = :kontak, nama_barang = :nama_barang WHERE id = :id";
        $stmt = $this->connect->prepare($query);

        $nama = htmlspecialchars(strip_tags($nama));
        $kontak = htmlspecialchars(strip_tags($kontak));
        $nama_barang = htmlspecialchars(strip_tags($nama_barang));

        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":kontak", $kontak);
        $stmt->bindParam(":nama_barang", $nama_barang);
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
