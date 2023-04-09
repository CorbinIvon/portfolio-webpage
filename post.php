<?php
include_once 'mysql.php';
if (isset($_GET['id'])) {
  if (!is_numeric($_GET['id'])) {
    die("<html><head><title>Post Not Found</title></head><body><p>Non-numeric id</p></body></html>");
  }
  $id = $_GET['id'];
  $sql = "SELECT * FROM posts WHERE id = " . $id . ";";
  $result = $mysql->query($sql);
  if ($result === FALSE) {
    die("<html><head><title>Post Not Found</title></head><body><p>Post Not Found</p></body></html>");
  }
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $content = $row['content'];
    $author = $row['author'];
    $date = $row['date'];
  } else {
    die("<html><head><title>Post Not Found</title></head><body><p>Post Not Found</p></body></html>");
  }
} else {
  die("<html><head><title>Post Not Found</title></head><body><p>Post Not Found</p></body></html>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/site.css">
    <title>Corbin Meier - Portfolio Home</title>
  </head>
  <body>
    <div class="content">
      <?php include_once "header.php" ?>
      <div class="compact">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $date; ?></p>
        <p><?php echo $author; ?></p>
      </div>
      <?php echo $content; ?>
      <?php include_once "footer.php" ?>
    </div>
  </body>