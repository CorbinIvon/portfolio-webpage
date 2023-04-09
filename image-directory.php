<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
  echo "POST:<pre>";
  var_dump($_POST);
  echo "</pre>";
  echo "FILES:<pre>";
  var_dump($_FILES);
  echo "</pre>";
  if ($_POST['password'] != getenv('POST_PASS')) {
    $error = "Incorrect Password";
    // header("Refresh: 5; url=new-post.php"); die("<html><head><title>New Post</title></head><body onload='setTimeout(function(){history.back()},3000)'><p>Incorrect Password, try again.</p></body></html>");
    die("<html><head><title>New Post</title></head><body><p>Incorrect Password, try again.</p><button onclick='history.back()'>Try Again</button></body></html>");
  }

  // Insert the data into the database.
  $uploadedFiles = $_FILES['files'];
}
// This script will handle the upload of files to the server, and will be browsable.
// Upload files and browse them here.

// Include the database connection.
include_once 'mysql.php';


?>