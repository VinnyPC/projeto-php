<?php

// Sample file: Never send your credentials to git

// host
$host = 'http://localhost/projeto-php';

// db
$db_name = 'db_users';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';

try {
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
  throw $th;
}
