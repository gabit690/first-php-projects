<?php

  date_default_timezone_set("America/Argentina/Buenos_Aires");

  if (!isset($GLOBALS['timeInit'])) {
    $timeInit = date('H-i-sa'); 
  }

  var_dump($GLOBALS);

  echo $GLOBALS['timeInit'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Hub</title>
    <link rel="stylesheet" href="./explorer.css">
</head>
<body>
  <h1>Explorer</h1>

  <div id="explorer-container">
    <div id="files-created">
      <h2>Created</h2>
      <p>archivo1.txt</p>
      <p>archivo2.txt</p>
      <a class="btn-create" href="./creator.php">new file</a>
    </div>
    <div id="files-uploaded">
      <h2>Uploaded</h2>
      <p>subido1.txt</p>
      <form action="" method="post">
        <h3>Upload file</h3>
        <input type="file" name="ffile" id="ffile">
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

  <?php include '../footer.php';?>
</body>
</html>