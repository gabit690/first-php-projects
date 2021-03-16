<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";

  // Create connection
  $connection = new mysqli($servername, $username, $password);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error) . "<br>";
  } else {
    echo "Connected successfully" . "<br>";
  }
  
  $existsDB = $connection->query("SHOW DATABASES LIKE '".$dbname."';")->num_rows > 0;

  if (!$existsDB) {
    // Create database
    if ($connection->query("CREATE DATABASE $dbname;") === TRUE) {
      echo "Database created"."<br>";
    } else {
      echo "Error creating database: " . $connection->error . "<br>";
    }
  } 

  $connection->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="./input.css">
    <link rel="stylesheet" href="../footer.css">
</head>
<body>
    <h1>Data inputs</h1>
    <form action="./database.php" method="post">
        <label for="fgame">Game: </label>
        <input 
          id="fgame"
          type="text" 
          name="fgame" 
          value=""
          required
        >
        <label for="fyear">Year: </label>
        <input
          id="fyear"
          type="text" 
          name="fyear" 
          value=""
        >
        <label for="fconsole">Console: </label>
        <input
          id="fconsole"
          type="text" 
          name="fconsole" 
          value=""
          required
        >
        <label for="fcompany">Company: </label>
        <input
          id="fcompany"
          type="text" 
          name="fcompany" 
          value=""
        >
        <input class="btn-form" type="submit" value="Submit">
    </form>
    <a class="btn-back" href="./data.php">DATA</a>
    <?php include '../footer.php';?>
</body>
</html>