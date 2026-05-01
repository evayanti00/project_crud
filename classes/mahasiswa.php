<?php
require_once 'config/database.php';

class Mahasiswa {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($nim, $nama, $jurusan, $alamat, $email, $no_hp) {
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, alamat, email, no_hp) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nim, $nama, $jurusan, $alamat, $email, $no_hp);
        return $stmt->execute();
    }

    public function read() {
        return $this->conn->query("SELECT * FROM mahasiswa");
    }

    public function update($id, $nim, $nama, $jurusan, $alamat, $email, $no_hp) {
        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nim=?, nama=?, jurusan=?, alamat=?, email=?, no_hp=? WHERE id=?");
        $stmt->bind_param("ssssssi", $nim, $nama, $jurusan, $alamat, $email, $no_hp, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
