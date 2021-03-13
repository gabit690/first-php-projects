<?php

  session_start();

  date_default_timezone_set("America/Argentina/Buenos_Aires");
  
  $_SESSION['user'] = "temporal";

  if (!isset($_SESSION['timeInit'])) {
    $_SESSION['timeInit'] = date('H-i-sa');
  }

  if (!isset($_SESSION['files-created'])) {
    $_SESSION['files-created'] = [];
  }

  if (!isset($_SESSION['files-uploaded'])) {
    $_SESSION['files-uploaded'] = [];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['fname'])) {
      $pathFile = "./created/" . $_POST['fname'] . ".txt";
      $file = fopen($pathFile, "w");
      fwrite($file, $_POST['fcontent']);
      fclose($file);
      if (isNewFile($_SESSION['files-created'], $_POST['fname'])) {
        array_push($_SESSION['files-created'], $_POST['fname']);
      } 
    }

    if (!empty($_FILES['ffile'])) {
      $pathUploadedFile = "./uploaded/" . basename($_FILES['ffile']['name']);
      if (!file_exists($pathUploadedFile)) {
        array_push($_SESSION['files-uploaded'], $_FILES['ffile']['name']);
        move_uploaded_file($_FILES["ffile"]["tmp_name"], $pathUploadedFile);
      } 
    }
  }

  echo 'Session init: ' . $_SESSION['timeInit'];

  function isNewFile(array $files, string $fname) : bool {
    return !in_array($fname, $files);
  }

  function showFileName($name) {
    echo '<p><a href=\'./viewer.php?'.'name='.$name.'\'>'.$name.'.txt'.'</a></p>';
  }

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

      <?php
        array_map("showFileName", $_SESSION['files-created']);
      ?>

      <a class="btn-form" href="./creator.php">new file</a>
    </div>
    <div id="files-uploaded">
      <h2>Uploaded</h2>

      <?php
        for ($i = 0; $i < count($_SESSION['files-uploaded']); $i++) {
          echo '<p>'.$_SESSION['files-uploaded'][$i].'</p>';
        }
      ?>

      <form 
        id="fupload" 
        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
        method="post"
        enctype="multipart/form-data"
      >
        <h3>Upload file</h3>
        <input type="file" name="ffile" id="ffile">
        <input class="btn-form" type="submit" value="Submit">
      </form>
    </div>
  </div>

  <?php include '../footer.php';?>
</body>
</html>