<?php
try{
  $dbhost = "localhost";
  $dbuser = "root";
  $dbname = "noteapp";
  $dbpass = "jerusalem1991";
  $conn = new PDO("mysql:host=$dbhost; port=3306; dbname=$dbname;", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // print "connected successfully";
 $sql = "CREATE TABLE notes(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  created_at DATETIME
  ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
  $conn->exec($sql);
  print "Notes table created successfully"; 
}catch(Error $e){
  //print 'Something went wrong ' . $e->getMessage();
  print 'Something went wrong, please try again later, thanks';
}