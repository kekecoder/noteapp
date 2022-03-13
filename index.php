<?php
require_once __DIR__ . "/Class/noteFunc.php";

$con = require_once __DIR__ . "/Class/controller.php";
$error = [];
$current = [
"id" => "", 
"title" => '', 
"description" => ""
]; 
if(isset($_GET['id'])){
  $current = $con->getById($_GET['id']);
}
if($_SERVER['REQUEST_METHOD'] === "POST"){
  $title = validInput($_POST['title']);
  $description = validInput($_POST['description']);
  $id = $_POST["id"] ?? '';
  
  if(!$title){
    $error['title'] = "This field cannot be empty";
  }
  if(!$description){
    $error['description'] = 'This field cannot be empty';
  }
  if(empty($error)){
    if($id){
     $con->updateNote($id, $title, $description);
    }else {
      $con->addNote($title, $description);
    }
    header("Location: views.php");
  }
}

/*echo "<pre>";
var_dump($current["id"]);
echo "</pre>";
exit;*/
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
    <div class="container mt-5">
        <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php foreach($current as $cur){echo $cur['id'] ?? '';} ?>">
                <label for="">Title</label>
                <input type="text" name="title" id=""
                    class="form-control <?php echo isset($error['title']) ? ' is-invalid' : '' ?>"
                    value="<?php foreach($current as $cur){echo $cur['title'] ?? '';}?>">
                <small class="invalid-feedback">
                    <?php echo $error['title'] ?? ''; ?>
                </small>
                <label for="">Note</label>
                <textarea name="description"
                    class="form-control <?php echo isset($error['description']) ? 'is-invalid' : '' ?>"><?php foreach($current as $cur){echo $cur['description'] ?? '';}?></textarea>
                <small class="invalid-feedback">
                    <?php 
          echo $error['description'] ?? '';
        ?>
                </small>
            </div>
            <?php if(isset($_GET['id'])): ?>
            <?php echo '<button class="btn btn-secondary">Update</button>' ?>
            <?php else: ?>
            <button class="btn btn-primary">Submit</button>
            <?php endif ?>
        </form>
    </div>
</body>

</html>