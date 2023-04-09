<?php
include_once 'mysql.php';
$sql = "SELECT * FROM posts ORDER BY date DESC;";
$result = $mysql->query($sql);
if ($result === FALSE) {
  die("<html><head><title>Post Not Found</title></head><body><p>Posts Not Found</p></body></html>");
}
if ($result->num_rows > 0) {
  $posts = array();
  while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
  }
} else {
  die("<html><head><title>Post Not Found</title></head><body><p>Posts Not Found</p></body></html>");
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
      <?php include_once 'header.php'; ?>
      <div id="content">
        <div id="recent-posts">
          <h1>Projects</h1>
          <?php
          foreach ($posts as $post){
            $title = $post['title'];
            $date = $post['date'];
            $id = $post['id'];
            echo "<a class='post link-button' href='post.php?id=" . $id . "'>";
            echo "<h1>" . $title . "</h1>";
            echo "<p>" . $date . "</p>";
            echo "</a>";
          }
          ?>
        </div>
      </div>
      <?php
      include_once 'footer.php';
      ?>
    </div>
  </body>
</html>