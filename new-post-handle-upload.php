<?php
include_once 'mysql.php';
if (isset($_POST['username']) || isset($_POST['password'])) {
  if ($_POST['password'] != getenv('POST_PASS') && $_POST['username'] != 'corbin') {
    die("<html><head><title>New Post</title></head><body><p>Incorrect Password, try again.</p><button onclick='history.back()'>Try Again</button></body></html>");
  }
  if (preg_match('/<h1>(.*?)<\/h1>/', $_POST['text-area-content'], $matches)) {
    $title = $matches[1];
  } else {
    $title = "Untitled";
  }
  $content = preg_replace('/<h1>(.*?)<\/h1>/', '', $_POST['text-area-content'], 1);
  $content = preg_replace('/^\n/', '', $content, 1);
  $content = preg_replace('/\n$/', '', $content, 1);
  $author = "Corbin Meier";

  $title = mysqli_real_escape_string($mysql, $title);
  $content = mysqli_real_escape_string($mysql, $content);
  $author = mysqli_real_escape_string($mysql, $author);
  
  $sql = "INSERT INTO posts (title, content, author) VALUES ('" . $title . "', '" . $content . "', '" . $author . "');";
  if ($mysql->query($sql) === TRUE) {
    echo "Successfully Created. Redirecting...";
    die(header("Refresh: 1; url=post.php?id=" . $mysql->insert_id));
    $mysql->close();
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
?>