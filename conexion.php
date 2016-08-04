<?php

  $user = 'root';
  $password = 'root';
  $db = 'comparadorPrueba';
  $host = 'localhost';
  $port = 8889;


  $mysqli = new mysqli($host, $user,$password, $db, $port);
if ($mysqli->connect_errno) {
  echo "Could not connect to server. (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
