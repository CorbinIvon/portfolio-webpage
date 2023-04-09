<div class="header">
  <div class="header-content">
    <img src="icons/corbin.jpg" class="profile-img" alt="ProfileImg">
  </div>
  <div class="header-content">
    <h1>Corbin Meier</h1>
    <div class="header-navigation">
      <a class="link-button" href="/">Home</a>
      <a class="link-button" href="about.php">About</a>
      <a class="link-button" href="contact.php">Contact</a>
    </div>
    <!-- Only show the next line if the port is 8080 -->
    <?php if ($_SERVER['SERVER_PORT'] == 8080) { ?>
      <a class="link-button float-top-right-corner" href="/new-post.php">New Post</a>
    <?php } ?>
  </div>
</div>