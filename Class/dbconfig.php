<?php
try 
{
        $url = getenv('JAWSDB_MARIA_URL');
        $dbparts = parse_url($url);
  
        $hostname = $dbparts['host'];
        $username = $dbparts['user'];
        $password = $dbparts['pass'];
        $database = ltrim($dbparts['path'],'/');
        $pdo = new PDO("mysql:host=$hostname; port=3306; dbname=$database; ", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      //print "connected successfully";
      $sql = "CREATE TABLE notes(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        created_at DATETIME
        ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        //$sql = "DROP TABLE users";
    $pdo->exec($sql);
    print "table created successfully";
  } 
  catch (PDOException $e) 
  {
      //print "An Exception has occured " . $e->getMessage();
      print "Something went wrong, please try again later.";
  }