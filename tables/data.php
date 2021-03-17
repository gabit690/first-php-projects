<?php
  $servername = "localhost";
  $username = "id16397224_root";
  $password = "(jV)5y#lvXRl5O!L";
  $dbname = "id16397224_mydb";

  // Create connection
  $connection = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error) . "<br>";
  } else {
    echo "Connected successfully" . "<br>";
  }
  
  $dataQuery = "SELECT * FROM Games;";
  $games = $connection->query($dataQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="./data.css">
</head>
<body>
    <h1>Data in database</h1>
    <h2>Games</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Console</th>
            <th>Company</th>
            <th>Year</th>
        </tr>
        <?php 

            while($row = $games->fetch_assoc()) {
                echo "<tr><td>".$row['Id']."</td><td>".$row['Name']."</td><td>".$row['Console']."</td><td>".$row['Company']."</td><td>".$row['Year']."</td></tr>";
            }

        ?>

    </table>
    <h2>Best company</h2>
    
    <?php 
        $bestCompanyQuery = "SELECT COUNT(Company), Company FROM Games GROUP BY Company ORDER BY COUNT(Company) DESC LIMIT 1;";
        $row = $connection->query($bestCompanyQuery)->fetch_assoc();
        echo "<p>" . $row['Company'] . "</p>";
    ?>

    <a class="btn-back" href="./input.php">Back</a>
</body>
</html>

<?php 

  $connection->close();

?>