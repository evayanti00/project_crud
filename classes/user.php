<?php
require_once 'config/database.php';

class Users extends Database {
    private $table = 'users';

    //method insert
    public function create($nama, $email, $password) {
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param("sss", $nama, $email, $password);
        return $stmt->execute();
    }
    //method selct all
    public function read(){
        $qry = "SELECT * FROM $this->table";
        return $this->conn->query($qry);
    }
    //method selectbyid
    public function readByID($id) {
        $qry = "SELECT * FORM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($qry);
        $stmt->blind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoch();
    }
    //metod update
    public function update($id, $nama, $email) {
        $qry = "UPDATE $this->table SET nama = ?, email= ? WHERE id = ?";
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param("ssi", $nama, $email, $id);
        return $stmt->execute(); 
    }
    //metod delete
    public function delete($id) {
        $qry = "DELETE FROM $this->table  WHERE id = ?";
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>