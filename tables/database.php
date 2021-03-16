<?php 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";

  // Create connection
  $connection = new mysqli($servername, $username, $password, $dbname);
  
  if (!$connection->query("SELECT * FROM Games;")) {
    // CREATE TABLE
    $connection->query("CREATE TABLE Games (
      Id int NOT NULL AUTO_INCREMENT,
      Name varchar(255) NOT NULL,
      Console varchar(255) NOT NULL,
      Company varchar(255) NOT NULL,
      Year int NOT NULL,
      PRIMARY KEY(Id)
    );");
  } 

  $fname = $_POST['fgame'];
  $fconsole = $_POST['fconsole'];
  $fcompany = $_POST['fcompany'];
  $fyear = $_POST['fyear'];

  $insertQuery = "INSERT INTO Games (Name, Console, Company, Year) VALUES ('$fname', '$fconsole', '$fcompany', $fyear)";

  $connection->query($insertQuery);

  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit;

?>