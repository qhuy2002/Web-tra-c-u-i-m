<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "nguyenquanghuy";

    try {
      $dbh = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // set the PDO error mode to exception
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage(); 
    }
?>