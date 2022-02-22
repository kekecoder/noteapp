<?php
//require_once "dbconfig.php";

class library{
  public PDO $conn;
  public function __construct(){
try{
  $this->conn = new PDO("mysql:host=127.0.0.1; port=3306; dbname=noteapp;", 'root', 'jerusalem');
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // print "connected successfully";
}catch(Error $e){
  //print 'Something went wrong ' . $e->getMessage();
  print 'Something went wrong, please try again later, thanks';
}
  }
  
  public function addNote($title, $description){
    $sql = $this->conn->prepare("INSERT INTO notes(title, description, created_at) VALUE(:title, :description, :created_at);");
    $sql->bindValue(":title", $title);
    $sql->bindValue(":description", $description);
    $sql->bindValue(':created_at', date("Y-m-d H:i:s"));
    return $sql->execute();
  }
  public function getNote(){
    $sql = $this->conn->prepare("SELECT * FROM notes");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
}

return new library;