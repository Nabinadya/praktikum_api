<?php
class Mahasiswa
{
    private $conn;
    private $table_name = "mahasiswa";
    public $id;
    public $nama;
    public $npm;
    public $jurusan;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nama=:nama, npm=:npm, jurusan=:jurusan";
        $stmt = $this->conn->prepare($query);
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->npm = htmlspecialchars(strip_tags($this->npm));
        $this->jurusan = htmlspecialchars(strip_tags($this->jurusan));
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":npm", $this->npm);
        $stmt->bindParam(":jurusan", $this->jurusan);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, npm=:npm, jurusan=:jurusan WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->npm = htmlspecialchars(strip_tags($this->npm));
        $this->jurusan = htmlspecialchars(strip_tags($this->jurusan));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":npm", $this->npm);
        $stmt->bindParam(":jurusan", $this->jurusan);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>