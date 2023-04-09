<?php
include_once 'new-post-handle-upload.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/site.css">
    <title>Portfolio - New Entry</title>
  </head>
  <body>
    <div class="content">
      <?php include_once "header.php";?>
      <form action="new-post.php" method="post" enctype="multipart/form-data">
        <h1>New Post</h1>
        <div>
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="password">
          <input type="submit" value="Submit">
        </div>
        <br>
        <button type="button" id="preview-button" >Preview Post</button>
        <button type="button" id="edit-button" style="display: None">Edit Post</button>
        <hr>
        <!-- Will use the markdown language to create posts -->
        <textarea class="textarea-handler" id="textarea-post-area" name="text-area-content" placeholder="New Post - HTML"></textarea>
        <div id="preview-post-area"></div>
      </form>
      <br>
      <?php include_once "footer.php";?>
    </div>
    <script src='js/site.js'></script>
  </body>
</html>