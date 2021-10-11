<?php

//XSS (and CSRF) protecc
header("Set-Cookie: name=value; HttpOnly; SameSite=lax");
header("Content-Security-Policy: img-src * default-src 'self' script-src 'none'; style-src *; ");

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webshop');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//token for authentication
$_SESSION['token'] = bin2hex(random_bytes(16));
