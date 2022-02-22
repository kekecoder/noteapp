<?php

$con = require_once __DIR__ . "/Class/controller.php";
$error = [];
if($_SERVER['REQUEST_METHOD'] === "POST"){
  $title = validInput($_POST['title']);
  $description = validInput($_POST['description']);
  
  if(!$title){
    $error['title'] = "This field cannot be empty";
  }
  if(!$description){
    $error['description'] = 'This field cannot be empty';
  }
  if(empty($error)){
    $con->addNote($title, $description);
    header("Location: /");
  }
}

function validInput($input){
  $input = trim($input);
  $input = htmlspecialchars($input);
  $input = strtolower($input);
  
  return $input;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap.css" type="text/css" media="all" />
  <title>Note App</title>
</head>
<body>
  <div class="container">
    <form action="" method="post">
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" id="" class="form-control <?php echo isset($error['title']) ? ' is-invalid' : '' ?>">
      <small class="invalid-feedback">
        <?php echo $error['title'] ?? ''; ?>
      </small>
      <label for="">Note</label>
      <textarea name="description" class="form-control <?php echo isset($error['description']) ? 'is-invalid' : '' ?>">
      </textarea>
      <small class="invalid-feedback">
        <?php 
          echo $error['description'] ?? '';
        ?>
      </small>
    </div>
    <button class="btn btn-primary">Submit</button>
  </form>
  </div>
</body>
</html>