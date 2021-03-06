<?php 
$con = require_once __DIR__ . "/Class/controller.php";
require_once __DIR__ . "/Class/noteFunc.php";

$notes = $con->getNote();

/*echo "<pre>";
var_dump($notes);
echo "</pre>";
exit;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <title>Note App</title>
</head>
<body>
  <div class="container">
    <a class="btn btn-success mt-3" href="/">Add new note</a>
    <?php foreach($notes as $note): ?>
<div class="card text-center mb-3 mt-3">
  <div class="card-header">
    <h5 class="card-title"><?php echo strtoupper($note['title'])?></h5>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo ucfirst(strtolower($note['description'])) ?></p>
    <a href="index.php?id=<?php echo $note['id']?>" class="btn btn-primary">Edit</a>
    <form action="delete.php" method="post" class="forms">
      <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
      <button class="btn btn-danger">Delete</button>
    </form>
    
  </div>
  <div class="card-footer text-muted">
    <?php 
      $when = $note['created_at'];
      $now = time_elapsed_string($when);
      echo $now;
    ?>
  </div>
</div>
    <?php endforeach ?>
  </div>

</body>
</html>