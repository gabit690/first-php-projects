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