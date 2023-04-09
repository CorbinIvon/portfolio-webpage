<?php
// Date: 2018-04-05 09:23:00
// Handles the connection to the MySQL database.
// apt install -y MariaDB-server
if (basename($_SERVER['PHP_SELF']) == 'mysql.php') {
    header('Location: index.php');
    die("Can not access this page directly.");
}
// Variables set in /etc/nginx/sites-available/default
// server {
//   ...
//   location ~ \.php$ {
//     ...
// 	   fastcgi_param DB_HOST    'localhost';
//     fastcgi_param DB_USER    'portfolio_web';
//     fastcgi_param DB_PASS    '__password__';
//     fastcgi_param DB_NAME    'portfolio';
//     fastcgi_param POST_PASS  '__password__'; // Password for posting content. preferably a long random string.
//     fastcgi_param EMAIL      'your@email.com';
//     ...
//   }
//   ...
// }

$mysql = new mysqli(
    getenv('DB_HOST'), 
    getenv('DB_USER'), 
    getenv('DB_PASS'), 
    getenv('DB_NAME')
);
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
?>