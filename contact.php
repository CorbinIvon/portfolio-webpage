<?php
$disable = true;
if (!$disable && isset($_POST['submit'])){
  $headers  = "From: ".getenv('FROM_EMAIL');
  $to_email = getenv('TO_EMAIL');
  $subject  = "Portfolio Contact Form";
  $message  = "You have received a message from your portfolio website from ".$_POST['name']."\nEmail: ".$_POST['email']."\n\nMessage:\n".$_POST['message']."\n\n";
  $message .= "\n\nDebug Information:";
  $message .= "\n\nSent on ".date("d/m/Y")." at ".date("h:i:sa");
  $message .= "\n\nIP Address: ".$_SERVER['REMOTE_ADDR'];
  $message .= "\n\nUser Agent: ".$_SERVER['HTTP_USER_AGENT'];
  $message .= "\n\nHost: ".$_SERVER['HTTP_HOST'];
  $email_status = (mail($to_email, $subject, $message, $headers) ? "Email successfully sent!" : "Email sending failed...");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/site.css">
    <title>Corbin Meier - Contact Me</title>
  </head>
  <body>
  <div class="content">
    <?php include_once 'header.php'; ?>

    <div class="compact">
      <h1>Contact Me</h1>
      <?php
      if ($disable){
        echo "<p>Sorry, but the contact form is currently disabled due to technical difficulties. Please try again later. We apologize for any inconvenience caused.</p>";
        echo "<p>You can contact me through <a href='mailto:".getenv('FROM_EMAIL')."' target='_blank'>this link</a>. Please provide a brief message explaining the purpose of your communication with me.</p>";
        echo "<p>Do not contact me with unsolicited offers, advertisements, or spam. Thank you for your understanding.</p>"; 
        include_once 'footer.php';
        die();
      }
      ?>
      <p>Feel free to contact me with any questions you may have. I'll get back to you as soon as I can.</p>
    </div>
    <form action="contact.php" method="post">
        <div>
          <input type="text" name="name" placeholder="Name" required><br>
          <input type="email" name="email" placeholder="Email" required>
        </div>
        <div>
          <textarea name="message" rows="8" cols="80" placeholder="Please provide a brief message explaining the purpose of your communication with me." required></textarea>
        </div>
        <div>
          <input type="submit" value="Submit" name="submit">
          <?php echo $email_status; ?>
        </div>
      </form>
    <?php include_once 'footer.php'; ?>
  </div>
</body>