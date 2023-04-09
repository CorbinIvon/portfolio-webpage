<?php
include_once 'mysql.php';
if (isset($_POST['username']) || isset($_POST['password'])) {
  // echo "POST:<pre>";
  // var_dump($_POST);
  // echo "</pre>";
  if ($_POST['password'] != getenv('POST_PASS') && $_POST['username'] != 'corbin') {
    // header("Refresh: 5; url=new-post.php"); die("<html><head><title>New Post</title></head><body onload='setTimeout(function(){history.back()},3000)'><p>Incorrect Password, try again.</p></body></html>");
    die("<html><head><title>New Post</title></head><body><p>Incorrect Password, try again.</p><button onclick='history.back()'>Try Again</button></body></html>");
  }
  // Get first instance of <h1> tag
  if (preg_match('/<h1>(.*?)<\/h1>/', $_POST['text-area-content'], $matches)) {
    $title = $matches[1];
  } else {
    $title = "Untitled";
  }
  // Remove first instance of <h1> tag
  $content = preg_replace('/<h1>(.*?)<\/h1>/', '', $_POST['text-area-content'], 1);
  $author = "Corbin Meier";

  $title = mysqli_real_escape_string($mysql, $title);
  $content = mysqli_real_escape_string($mysql, $content);
  $author = mysqli_real_escape_string($mysql, $author);
  
  $sql = "INSERT INTO posts (title, content, author) VALUES ('" . $title . "', '" . $content . "', '" . $author . "');";
  if ($mysql->query($sql) === TRUE) {
    echo "Post successfully created. Redirecting...";
    // get new post id inserted
    // die(header("Refresh: 3; url=new-post.php"));
    die(header("Refresh: 2; url=post.php?id=" . $mysql->insert_id));
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