<?php 

  session_start();

  echo 'Session init: ' . $_SESSION['timeInit'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator</title>
    <link rel="stylesheet" href="./viewer.css">
</head>
<body>
    <h1 class="title">Viewer</h1>
    <div class="fcontainer">
        <fieldset>
            <legend>Name</legend>
            <p class="fname">
                <?php echo $_GET['name'] . '.txt';?>
            </p>
        </fieldset>
        <fieldset>
            <legend>Content</legend>
            <p class="fcontent">
                <?php
                    $pathFile = './created/'.$_GET['name'].'.txt';
                    $myfile = fopen($pathFile, "r");
                    while(!feof($myfile)) {
                        echo fgets($myfile) . "<br>";
                    }
                    fclose($myfile);
                ?>
            </p>
        </fieldset>
    </div>
    <a class="btn-back" href="./explorer.php">Back</a>
</body>
</html>