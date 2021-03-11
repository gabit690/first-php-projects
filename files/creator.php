<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator</title>
    <link rel="stylesheet" href="./creator.css">
</head>
<body>
    <h1 class="title">Creator</h1>
    <form 
      action="<?php echo htmlspecialchars('./explorer.php');?>"
      method="post"
    >
        <label for="fname">Name:</label>
        <input id="fname" type="text" name="fname">

        <label for="fcontent">Content</label>
        <textarea name="fcontent" id="fcontent" cols="30" rows="10"></textarea>

        <input type="submit" value="Submit">

    </form>
</body>
</html>