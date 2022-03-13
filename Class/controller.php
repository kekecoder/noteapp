<?php
class library{
  public $conn;
  public function __construct(PDO $conn){
    $this->conn = $conn;

  }
  
  public function addNote($title, $description){
    $sql = $this->conn->prepare("INSERT INTO notes(title, description, created_at) VALUE(:title, :description, :created_at);");
    $sql->bindValue(":title", $title);
    $sql->bindValue(":description", $description);
    $sql->bindValue(':created_at', date("Y-m-d H:i:s"));
    return $sql->execute();
  }
  public function getNote(){
    $sql = $this->conn->prepare("SELECT * FROM notes ORDER BY created_at DESC");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function getById($id){
    $sql = $this->conn->prepare("SELECT * FROM notes WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
  public function updateNote($id, $title, $description){
    $sql = $this->conn->prepare("UPDATE notes SET title = :title, description = :description WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":title", $title);
    $sql->bindValue(":description", $description);
    return $sql->execute();
  }
  public function deleteNote($id){
    $sql = $this->conn->prepare("DELETE FROM notes WHERE id = :id");
    $sql->bindValue(":id", $id);
    return $sql->execute();
  }
}

return new library(require_once "dbconfig.php");