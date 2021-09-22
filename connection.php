<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>connection-query</title>
  </head>
  <body>

<?php

$servername="localhost";
$username="root";
$password="";
$dbname="";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
  die("connection failed " . mysqli_connect_error());
} else {
  echo "connection successfull";
}
?>

<?php
$sql='INSERT INTO userinfo (name, email) VALUES("Willcoolpro","willywacker@gmail.com")';
if(!mysqli_query($conn, $sql)){
  die("nope" . mysqli_error($conn));
}
echo "it worked";
*/
?>


</body>
</html>
