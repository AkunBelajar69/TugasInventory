<?php
class AdminModel {
    private $connect;
    private $table_name = "admin";

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

    public function create($nama, $kontak, $email) {
        $query = "INSERT INTO " . $this->table_name . " (nama, kontak, email) VALUES (:nama, :kontak, :email)";
        $stmt = $this->connect->prepare($query);

        $nama = htmlspecialchars(strip_tags($nama));
        $kontak = htmlspecialchars(strip_tags($kontak));
        $email = htmlspecialchars(strip_tags($email));

        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":kontak", $kontak);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }

    public function update($id, $nama, $kontak, $email) {
        $query = "UPDATE " . $this->table_name . " SET nama = :nama, kontak = :kontak, email = :email WHERE id = :id";
        $stmt = $this->connect->prepare($query);

        $nama = htmlspecialchars(strip_tags($nama));
        $kontak = htmlspecialchars(strip_tags($kontak));
        $email = htmlspecialchars(strip_tags($email));

        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":kontak", $kontak);
        $stmt->bindParam(":email", $email);
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
