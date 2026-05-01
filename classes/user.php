<?php
require_once 'config/database.php';

class Users extends Database {
    private $table = 'users';

    // CREATE
    public function create($nama, $email, $password) {
        $qry = "INSERT INTO $this->table (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($qry);

        if ($stmt === false) {
            die("Error prepare: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $nama, $email, $password);
        return $stmt->execute();
    }

    // READ ALL
    public function read() {
        $qry = "SELECT * FROM $this->table";
        return $this->conn->query($qry);
    }

    // READ BY ID
    public function readByID($id) {
        $qry = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($qry);

        if ($stmt === false) {
            die("Error prepare: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function update($id, $nama, $email) {
        $qry = "UPDATE $this->table SET nama = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($qry);

        if ($stmt === false) {
            die("Error prepare: " . $this->conn->error);
        }

        $stmt->bind_param("ssi", $nama, $email, $id);
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $qry = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($qry);

        if ($stmt === false) {
            die("Error prepare: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
