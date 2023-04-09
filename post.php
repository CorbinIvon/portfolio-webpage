<?php
include_once 'mysql.php';
if (isset($_GET['id']))
  if (!is_numeric($_GET['id']))
    die("<html><head><title>Post Not Found</title></head><body><p>Non-numeric id</p></body></html>");
if (isset($_POST['username']) || isset($_POST['password'])){
  if ($_POST['password'] != getenv('POST_PASS') && $_POST['username'] != 'corbin') {
    die("<html><head><title>Update Post</title></head><body><p>Incorrect Password, try again.</p><button onclick='history.back()'>Try Again</button></body></html>");
  }
  $id = $_GET['id'];
  $content = mysqli_real_escape_string($mysql, $_POST['text-area-content']); // Not a real secure way to scrub the user input.
  $sql = "UPDATE posts SET content = '" . $content . "' WHERE id = " . $id . ";";
  if ($mysql->query($sql) === TRUE) {
    echo "Post Successfully Updated.";
  } else {
    echo "Error: ".$mysql->error;
    echo "<br>sql: ";
    echo "<pre>";
    echo var_dump($sql);
    echo "</pre>";
    $mysql->close();
    die("<html><head><title>mysql->query error!</title></head><body><p>mysql->query error!</p><button onclick='history.back()'>Try Again</button></body></html>");
  }
}
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = " . $id . ";";
$result = $mysql->query($sql);
if ($result === FALSE) {
  die("<html><head><title>Post Not Found</title></head><body><p>Post Not Found</p>Exit Code: 1</body></html>");
}
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $title = $row['title'];
  $content = $row['content'];
  $author = $row['author'];
  $date = $row['date'];
} else {
  die("<html><head><title>Post Not Found</title></head><body><p>Post Not Found</p>Exit Code: 2</body></html>");
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
      <div id="preview-post-area"><?php echo $content; ?></div>
      <?php if ($_SERVER['SERVER_PORT'] == 8080) { ?>
        <form action="post.php?id=<?php echo $_GET['id']?>" method="post" id="login-togglable" style="display: None">
          <textarea class="textarea-handler" id="textarea-post-area" name="text-area-content"></textarea>
          <br>
          <button type="button" id="preview-button" style="display: None">Preview Post</button>
          <br>
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="password">
          <input type="submit" value="Submit">
          <br>
        </form>
        <button type="button" id="edit-button">Edit Post</button>
        <br>
        <br>
        <?php } ?>
      <script src='js/site.js'></script>
      <?php include_once "footer.php" ?>
    </div>
  </body>